<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Site;
use App\Models\Queue;
use Livewire\Component;
use App\Jobs\PingIpAddress;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

class ClientSection extends Component
{
    /**
     * The list of IPs from the client sites
     * @var string
     */
    public $ips = [];

    public Client $client;

    /**
     * The results from the cache.
     * @var array
     */
    public $results = [];

    /**
     * Flag to control polling.
     * @var bool
     */
    public $isRunning = false;

    public function mount(Client $client)
    {
        $this->client = $client;
        $client = $client->load('sites');
        $this->ips = $client->sites->pluck('ip_address');
        // dd($this->ips);
    }

    /**
     * The main action to start the pinging process.
     * Dispatches jobs to the queue.
     */
    public function startPinging()
    {
        // $this->cleanupOldPings();

        if (empty($this->ips)) {
            dd('hit');
            return;
        }

        $this->isRunning = true;
        $this->results = []; // Clear visual results

        // Store the list of IPs to be checked in the cache.
        // This is how the polling method knows which IPs to look for.
        // Cache::put('ping_app_ip_list', $this->ips, now()->addSeconds(5));

        $this->ips = $this->client->sites->pluck('ip_address');

        $queues = Queue::query()->get()->pluck('name');
        // dd($queues);
        $queuesCount = $queues->count();
        // dd($queuesCount);
        $queueIndex = 0;
        // Dispatch a separate job for each IP.
        // The queue workers will process these in parallel.
        foreach ($this->ips as $ip) {
            // distribute the pings to multiple queues for parallel processing
            $q = $queues[$queueIndex];

            $queueIndex = $queueIndex + 1;

            if ($queueIndex >= $queuesCount) {
                // reset the counter
                $queueIndex = 0;
            }

            PingIpAddress::dispatch($ip)->onQueue($q);
        }
    }

    /**
     * Stops the polling from the frontend.
     * Note: This does NOT stop the in-progress queue jobs.
     */
    // public function stopPinging()
    // {
    //     $this->isRunning = false;
    // }

    /**
     * This method is called by `wire:poll` every second.
     * It checks the cache for results written by the jobs.
     */
    public function pollResults()
    {
        // if (!$this->isRunning) {
        //     return;
        // }

        // Get the master list of IPs we are supposed to be checking
        // $this->ips = Cache::get('ping_app_ip_list', []);
        if (empty($this->ips)) {
            $this->isRunning = false;
            return;
        }

        $currentResults = [];
        $completedCount = 0;

        foreach ($this->ips as $ip) {
            // Check the cache for a result for this specific IP
            // $result = Cache::get('ping_result_' . $ip);

            // Check database for a result for this specific IP
            $result = Site::query()->where('ip_address', '=', $ip)->first()->pluck('ping_output');

            if ($result) {
                $currentResults[$ip] = $result;
                $completedCount++;
            } else {
                // No result yet, mark as pending
                $currentResults[$ip] = ['status' => 'pending', 'ip' => $ip, 'raw' => 'Pinging...'];
            }
        }

        $this->results = $currentResults;

        // If all IPs have a result, stop polling.
        // if ($completedCount === count($this->ips)) {
        // $this->isRunning = false;
        // Optional: Clean up the master list
        // Cache::forget('ping_app_ip_list');
        // }
    }

    /**
     * Helper to clear all ping-related keys from the cache.
     */
    // private function cleanupOldPings()
    // {
    //     $oldIps = Cache::get('ping_app_ip_list', []);
    //     foreach ($oldIps as $ip) {
    //         Cache::forget('ping_result_' . $ip);
    //     }
    //     Cache::forget('ping_app_ip_list');
    // }

    public function render()
    {
        return view('livewire.client-section');
    }
}
