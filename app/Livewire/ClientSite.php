<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Process;
use App\Models\Ping;
use App\Models\Site;
use App\Models\Client;

class ClientSite extends Component
{
    
    public $ipAddress;
    public string $output = '';
    private $process;
    // Variable related with checking successful uptime
    public $maxLoopIterations = 5;
    public $loopCounter = 0;
    public $successfulRepliesCount = 0;
    public $isPingSuccessful = false; 
    public Site $site;


    public function mount(Site $site)
    {
        $this->site = $site;
        $this->ipAddress = $site->ip_address;
    }

    public function pingIp()
    {
        $this->process = Process::forever()->start("ping -t {$this->ipAddress}");
        
        while ($this->process->running()) {

            $this->output = $this->process->latestOutput();

            // the while loop runs the first time
            // we check the loopCounter, if it is zero, we just started, we increment it by 1, 
            // we check the process output string, if a reply string is present, we increment the successfulRepliesCount, otherwise, not 
            // if we are in the fourth iteration and successfulRepliesCount is at least 1, we set isPingSuccessful to true, otherwise, false  
            // if we reach the maxLoopIterations (when loopCounter = maxLoopIterations), we reset uptime variables, apart from the isPingSuccessful variable;

            if($this->maxLoopIterations == $this->loopCounter) {
                $this->site = $this->site->fresh();

                $siteIsOnline = $this->site->is_online;
                // we have reached the end of the loop, we reset it
                if ($this->successfulRepliesCount > 0) {
                    $this->isPingSuccessful = true;
                    if($siteIsOnline == false){
                        $this->site->update([
                            'is_online' => true,
                        ]);
                    }
                     
                } else {
                    $this->isPingSuccessful = false;
                    
                    if($siteIsOnline == true){
                        $this->site->update([
                            'is_online' => false,
                        ]); 
                    }  
                }

                // reset the loopCounter, and the successfulRepliesCount, to start all over again. 
                $this->reset(['loopCounter', 'successfulRepliesCount']);
            } else {

                // check the output string, for a "bytes=" in: "Reply from 196.202.165.161: bytes=32 time=627ms TTL=46"
                if(strpos($this->output, "bytes=") !== false) {
                    $this->successfulRepliesCount++;
                }

                $this->loopCounter++;

            }

            $this->stream(  
                to: 'pingResponse' . $this->site->id,
                content: nl2br($this->output),
                replace: true,
            );

            // usleep(350000);
            sleep(3);
        }
    }

    public function render()
    {
        return view('livewire.client-site');
    }
}
