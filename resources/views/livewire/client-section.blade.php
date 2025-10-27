<div wire:poll.5s="startPinging" class="col-span-4">
    <div class="card border-2 rounded">
        <div class="card-body p-[2px]">
            <h2 class="text-md font-bold">{{ $client->name }}</h2>
            <div class="grid grid-cols-12 gap-1">
                {{-- list of client sites --}}
                @foreach ($client->sites as $site)
                    <div class="col-span-6">
                        <div class="card bg-gray-900 border-solid border-[1px] border-black-300 rounded text-white">
                            <div class="card-body p-[2px]">
                                <div class="flex justify-start text-[10px]">
                                    @if ($site->ping_output['status'] == 'success')
                                        <div class="badge badge-success badge-xs"></div>
                                    @else
                                        <div class="badge badge-error badge-xs"></div>
                                    @endif

                                    <p class="text-[10px] ms-1 font-semibold">
                                        {{ $site->name }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                {{-- {"status":"failed","ip":"196.202.164.9","raw":"Request timed out."} --}}
                                <p class="text-[9px] p-[1px]">{{ $site->ping_output['raw'] }}</p>
                                {{-- <p class="text-[9px] p-[1px]">Reply from 196.202.165.161: bytes=32 time=627ms TTL=46</p>
                                <p class="text-[9px] p-[1px]">Reply from 196.202.165.161: bytes=32 time=627ms TTL=46</p>
                                <p class="text-[9px] p-[1px]">Reply from 196.202.165.161: bytes=32 time=627ms TTL=46</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- endforeach client sites --}}

            </div>
        </div>
    </div>
</div>
