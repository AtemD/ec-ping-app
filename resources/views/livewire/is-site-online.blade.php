<div>
    <div wire:key="{{ $site->id }}" wire:poll.keep-alive.2s class="badge badge-{{ $isSiteOnlineStatus == true ? 'success' : 'error' }} badge-sm"></div>
</div>
