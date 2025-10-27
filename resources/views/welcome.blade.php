<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EC Ping App</title>
    <!-- Favicons -->
    <link href="{{ asset('images/sample-ping-logo.png') }}" rel="icon">

    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="">

    <div class="flex items-between">
        <div class="grid grid-cols-12 gap-1">
            @foreach ($clients as $client)
                <livewire:client-section wire:key="{{ $client->id }}" :client="$client">
            @endforeach
        </div>
    </div>

    @livewireScripts
    @vite('resources/js/app.js')

</body>

</html>
