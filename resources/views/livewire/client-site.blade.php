<div class="card rounded bg-base-100 w-96 shadow-xl border-solid border-1 my-1 mx-1">
    <div class="card-body p-0">
        <div class="flex justify-between">
            <h2 class="card-title">
                <livewire:is-site-online wire:key="{{ $site->id }}" :site="$site">{{ $site->name }}
            </h2>
            <button id="clickButton{{ $site->id }}" wire:click="pingIp" class="btn btn-sm btn-outline">Ping</button>
        </div>
        

        <ul class="list-none h-14 overflow-hidden">
            {{-- <li class="text-sm">Reply from 196.202.165.161: bytes=32 time=627ms TTL=46</li>
            <li class="text-sm">Reply from 196.202.165.161: bytes=32 time=627ms TTL=46</li>
            <li class="text-sm">Reply from 196.202.165.161: bytes=32 time=627ms TTL=46</li> --}}
            <li wire:stream="pingResponse{{ $site->id }}" class="text-sm">{{ $output }}</li>
        </ul>
    </div>
</div>