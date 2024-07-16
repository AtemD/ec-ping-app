<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ping;
use Illuminate\Http\Response;

class PingStatus extends Component
{
    public function render()
    {
        // return view('livewire.ping-status');

        return view('livewire.ping-status', [
            $pingStatus1= Ping::first()->refresh()->status,
            'pingStatus' => Ping::first()->refresh()->status,
            logger($pingStatus1)
        ])->response(function(Response $response) {
            $response->header('Cache-Control', 'no-cache');
        });;
    }
}
