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

<body class="font-sans antialiased flex flex-col min-h-screen">

    <div class="flex flex-col flex-1">
        <main class="bg-base-200 min-h-[calc(100vh-4rem)]">
            {{-- <div class="grid grid-cols-12 gap-2"> --}}
            {{-- <div class="col-span-12"> --}}
            <div class="mb-8">
                <svg class="h-16 w-16 mr-4" viewBox="0 0 24 24" fill="currentColor">
                </svg>
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-1">EXPERT COMMUNICATIONS</h1>
                    <p class="text-xl md:text-2xl">Your reliable & affordable Internet Service Provider</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <div
                    class="card bg-blue-900 border border-white p-6 flex flex-col items-center justify-center text-center">
                    <img src="{{ asset('images/sample-ping-logo.png') }}" alt="Starlink" class="w-24 h-24 mb-4">
                    <p class="text-2xl font-semibold">Starlink</p>
                </div>
                <div
                    class="card bg-blue-900 border border-white p-6 flex flex-col items-center justify-center text-center">
                    <img src="{{ asset('images/sample-ping-logo.png') }}" alt="Fiber Optics" class="w-24 h-24 mb-4">
                    <p class="text-2xl font-semibold">Fiber Optics</p>
                </div>
                <div
                    class="card bg-blue-900 border border-white p-6 flex flex-col items-center justify-center text-center">
                    <img src="{{ asset('images/sample-ping-logo.png') }}" alt="VSAT" class="w-24 h-24 mb-4">
                    <p class="text-2xl font-semibold">VSAT</p>
                </div>
            </div>
            <p class="text-xl md:text-2xl text-center mb-8 border-t border-b border-green-500 py-4">
                Wireless Internet | Radio & Satellite | ICT Services
            </p>

            <p class="text-xl md:text-2xl text-center mb-6">
                We are available in all 10 states and 3 Administrative Areas
            </p>

            <div class="flex flex-col md:flex-row justify-center items-center text-center md:space-x-8">
                <p class="text-2xl md:text-3xl font-bold mb-2 md:mb-0">+211 925 939 700|1|2|3</p>
                <a href="https://www.ec-southsudan.com"
                    class="text-2xl md:text-3xl font-bold text-red-500 hover:underline">www.ec-southsudan.com</a>
            </div>
            {{-- </div> --}}
            {{-- </div> --}}
        </main>
    </div>



    {{-- <div class="relative w-full h-auto bg-blue-800 text-white p-8 md:p-12 lg:p-16">
                <div class="flex items-center mb-8">
                    <svg class="h-16 w-16 mr-4" viewBox="0 0 24 24" fill="currentColor">
                    </svg>
                    <div>
                        <h1 class="text-4xl md:text-5xl font-bold mb-1">EXPERT COMMUNICATIONS</h1>
                        <p class="text-xl md:text-2xl">Your reliable & affordable Internet Service Provider</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                    <div
                        class="card bg-blue-900 border border-white p-6 flex flex-col items-center justify-center text-center">
                        <img src="/path/to/starlink-icon.png" alt="Starlink" class="w-24 h-24 mb-4">
                        <p class="text-2xl font-semibold">Starlink</p>
                    </div>
                    <div
                        class="card bg-blue-900 border border-white p-6 flex flex-col items-center justify-center text-center">
                        <img src="/path/to/fiber-icon.png" alt="Fiber Optics" class="w-24 h-24 mb-4">
                        <p class="text-2xl font-semibold">Fiber Optics</p>
                    </div>
                    <div
                        class="card bg-blue-900 border border-white p-6 flex flex-col items-center justify-center text-center">
                        <img src="/path/to/vsat-icon.png" alt="VSAT" class="w-24 h-24 mb-4">
                        <p class="text-2xl font-semibold">VSAT</p>
                    </div>
                </div>

                <p class="text-xl md:text-2xl text-center mb-8 border-t border-b border-green-500 py-4">
                    Wireless Internet | Radio & Satellite | ICT Services
                </p>

                <p class="text-xl md:text-2xl text-center mb-6">
                    We are available in all 10 states and 3 Administrative Areas
                </p>

                <div class="flex flex-col md:flex-row justify-center items-center text-center md:space-x-8">
                    <p class="text-2xl md:text-3xl font-bold mb-2 md:mb-0">+211 925 939 700|1|2|3</p>
                    <a href="https://www.ec-southsudan.com"
                        class="text-2xl md:text-3xl font-bold text-red-500 hover:underline">www.ec-southsudan.com</a>
                </div>
    </div> --}}

    @livewireScripts
    @vite('resources/js/app.js')

</body>

</html>
