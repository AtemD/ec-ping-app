<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Site;
use Illuminate\Support\Facades\Cache;

class PingIpAddress implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The IP address to ping.
     * @var string
     */
    public $ip;

    /**
     * Create a new job instance.
     *
     * @param string $ip
     */
    public function __construct(string $ip)
    {
        $this->ip = $ip;
    }

    /**
     * Execute the job.
     * This is where the actual ping happens.
     */
    public function handle()
    {
        $output = [];
        $return_var = 1;
        $command = '';
        $os = PHP_OS_FAMILY;

        // Create an OS-specific ping command.
        // - Windows: `ping -n 1` (1 packet), `-w 1000` (1000ms timeout)
        // - Linux/macOS: `ping -c 1` (1 packet), `-W 1` (1 second timeout)
        if ($os === 'Windows') {
            $command = "ping -n 1 -w 1000 " . escapeshellarg($this->ip);
        } else {
            $command = "ping -c 1 -W 1 " . escapeshellarg($this->ip);
        }

        // Execute the command
        exec($command, $output, $return_var);

        $raw_output = implode("\n", $output);
        $result = $this->parsePingResult($raw_output, $return_var, $os);

        // Store the result in the cache for 10 minutes.
        // The key is prefixed to be unique for this IP.
        // Cache::put('ping_result_' . $this->ip, $result, now()->addSeconds(10));

        // Insert in the database 
        Site::query()->where('ip_address', '=', $this->ip)->update([
            'ping_output' => $result
        ]);
    }

    /**
     * Parses the raw shell output into a structured array.
     *
     * @param string $raw_output
     * @param int $return_var
     * @param string $os
     * @return array
     */
    private function parsePingResult(string $raw_output, int $return_var, string $os): array
    {
        if ($return_var !== 0) {
            // Ping command failed (e.g., timeout, host unreachable)
            $raw = "Request timed out.";
            if (str_contains($raw_output, 'Destination host unreachable')) {
                $raw = "Destination host unreachable.";
            }
            return ['status' => 'failed', 'ip' => $this->ip, 'raw' => $raw];
        }

        // Ping was successful, try to parse the time
        $time = 'N/A';

        if ($os === 'Windows') {
            // Windows output: "Reply from 1.1.1.1: bytes=32 time=12ms TTL=59"
            if (preg_match('/time[=<](\d+ms)/', $raw_output, $matches)) {
                $time = $matches[1];
            }
        } else {
            // Linux/macOS output: "64 bytes from 1.1.1.1: icmp_seq=1 ttl=59 time=11.6 ms"
            if (preg_match('/time=(\d+\.?\d* ms)/', $raw_output, $matches)) {
                $time = $matches[1];
            }
        }

        return [
            'status' => 'success',
            'ip' => $this->ip,
            'time' => $time,
            'raw' => "Reply from {$this->ip}: time={$time}"
        ];
    }
}
