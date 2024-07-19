<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Site;
use Illuminate\Http\Response;

class PingStatus extends Component
{
    public Site $site;

    public function mount(Site $site)
    {
        $this->site = $site;
    }

    public function render()
    {
        // return view('livewire.ping-status');

        return view('livewire.ping-status', [
            // $pingStatus1= Ping::first()->refresh()->status,
            'pingStatus' => $this->site->refresh()->is_online,
        ])->response(function(Response $response) {
            $response->header('Cache-Control', 'no-cache');
        });
    }
}
