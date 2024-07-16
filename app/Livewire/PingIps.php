<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Process;
use App\Models\Ping;
use Illuminate\Http\Response;

class PingIps extends Component
{
    public $ipAddress = '196.202.165.161';

    public string $output = '';
    public string $prevOutput = '';

    private $process;

    // Variable related with checking successful uptime
    public $maxLoopIterations = 5;
    public $loopCounter = 0;
    public $successfulRepliesCount = 0;
    public $isPingSuccessful = false; 

    public Ping $ping;


    public function pingIps()
    {

        $this->ping = Ping::first();

        $this->process = Process::forever()->start("ping -t {$this->ipAddress}");
        
        while ($this->process && $this->process->running()) {

            $this->output = $this->process->latestOutput();

            // the while loop runs the first time
            // we check the loopCounter, if it is zero, we just started, we increment it by 1, 
            // we check the process output string, if a reply string is present, we increment the successfulRepliesCount, otherwise, not 
            // if we are in the fourth iteration and successfulRepliesCount is at least 1, we set isPingSuccessful to true, otherwise, false  
            // if we reach the maxLoopIterations (when loopCounter = maxLoopIterations), we reset uptime variables, apart from the isPingSuccessful variable;

            if($this->maxLoopIterations == $this->loopCounter) {
                $this->ping = Ping::first()->fresh();
                $pingStatus = $this->ping->status;
                // we have reached the end of the loop, we reset it
                if ($this->successfulRepliesCount > 0) {
                    $this->isPingSuccessful = true;
                    // $this->dispatchPingSuccessEvent();
                    if($pingStatus == false){
                        $this->ping->update([
                            'status' => true,
                        ]);
                    }
                    // sleep(1);
                     
                } else {
                    $this->isPingSuccessful = false;
                    // $this->dispatchPingErrorEvent();
                    
                    if($pingStatus == true){
                        $this->ping->update([
                            'status' => false,
                        ]); 
                    }  
                    // sleep(1);
                }

                // reset the loopCounter, and the successfulRepliesCount, to start all over again. 
                $this->reset(['loopCounter', 'successfulRepliesCount']);
            } else {

                // check the output string, for a "Reply" in: "Reply from 196.202.165.161: bytes=32 time=627ms TTL=46"
                // other output strings include: 
                // 1. Reply from 192.168.1.24: Destination host unreachable.
                // 2. Request timed out.
                // 3. PING: transmit failed. General failure.
                // 4. General failure.
                // 5. Reply from 192.168.1.1: Destination net unreachable.
                // 6. Reply from 196.202.165.161: bytes=32 time=627ms TTL=46
                if(strpos($this->output, "bytes=") !== false) {
                    // logger('Reply count: ' . $this->successfulRepliesCount);
                    $this->successfulRepliesCount++;
                }

                $this->loopCounter++;

            }

            $this->stream(  
                to: 'pingResponse',
                content: nl2br($this->output),
                replace: true,
            );

            usleep(350000);
            // sleep(1);
        }
    }

    public function render()
    {
        return view('livewire.ping-ips')->response(function(Response $response) {
            $response->header('Cache-Control', 'no-cache');
        });
        // ->header('Cache-Control', 'no-cache');
    }
}
