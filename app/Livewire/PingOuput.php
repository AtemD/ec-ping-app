<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Site;

class PingOuput extends Component
{
    public Site $site;
    public bool $isSiteOnlineStatus = false;

    public function mount(Site $site)
    {
        $this->site = $site;
    }

    public function render()
    {
        $this->isSiteOnlineStatus = $this->site->refresh()->is_online;
        return view('livewire.is-site-online', [
            'isSiteOnlineStatus' => $this->isSiteOnlineStatus,
        ]);
    }
}
