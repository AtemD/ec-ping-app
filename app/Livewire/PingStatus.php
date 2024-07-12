<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ping;
class PingStatus extends Component
{
    public function render()
    {
        // return view('livewire.ping-status');

        return view('livewire.ping-status', [
            'pingStatus' => Ping::first()->refresh()->status,
        ]);
    }
}
