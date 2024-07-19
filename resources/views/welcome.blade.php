<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EC Ping App</title>
    <!-- Favicons -->
    <link href="{{ asset('images/logo-ec-southsudan.jpeg') }}" rel="icon">

    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
  {{-- <div class="card rounded bg-base-100 w-96 shadow-xl border-solid border-1 my-1 mx-1">
    <div class="card-body p-0">
        <div class="flex justify-between">
            <h2 class="card-title">
              <div>
                <div class="badge badge-error badge-sm"></div>
            </div>
            Torit Site
            </h2>
            <button id="clickButton" wire:click="pingIp" class="btn btn-sm btn-outline">Ping</button>
        </div>
        

        <ul class="list-none h-15 overflow-hidden">
            <li class="text-sm">Reply from 196.202.165.161: bytes=32 time=627ms TTL=46</li>
            <li class="text-sm">Reply from 196.202.165.161: bytes=32 time=627ms TTL=46</li>
            <li class="text-sm">Reply from 196.202.165.161: bytes=32 time=627ms TTL=46</li>
        </ul>
    </div>
</div> --}}
{{-- <div class="badge badge-error badge-sm"></div>
<div class="badge badge-success badge-sm"></div> --}}
{{-- <button id="clickButton" wire:click="pingIp" class="btn btn-sm btn-outline">Ping</button> --}}

    @foreach ($clients as $client)
        @foreach ($client->sites as $site)
          <livewire:client-site wire:key="{{ $site->id }}" :site="$site">
        @endforeach
    @endforeach

    @livewireScripts

    <script>
        // function autoRefresh() {
        //     window.location = window.location.href;
        // }
        // setInterval('autoRefresh()', 6000);

        // window.onload = function(){
        // function clickToPing() {
        //   window.location = window.location.href;

        //   window.onload = function () {
        //     document.getElementById('clickButton').click();
        //   }

        // }

        // }

        // setInterval('clickToPing()', 5000);
    </script>
</body>

</html>
