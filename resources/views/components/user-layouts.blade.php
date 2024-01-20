<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @wireUiScripts
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div>
        <div
            class="mx-auto max-w-7xl flex justify-between items-center rounded-b-3xl sticky top-0 z-30  py-10 shadow-2xl bg-[#274C77] 2xl:px-20">
            <div class="flex items-center space-x-1">
                <img src="{{ asset('images/logo.png') }}" class="h-16" alt="">
                <div class="text-white">
                    <h1 class="font-bold uppercase text-2xl">Laundry</h1>
                    <h1 class="leading-3">Booking System</h1>
                </div>
            </div>
            <div class="hidden 2xl:block">
                <div class="flex space-x-7 items-center">
                    <a href="" class="font-medium text-white hover:text-gray-300 ">
                        HOME
                    </a>
                    <a href="" class="font-medium text-white hover:text-gray-300 ">
                        ABOUT
                    </a>
                    <a href="" class="font-medium text-white hover:text-gray-300 ">
                        PRICING
                    </a>
                    <a href="" class="font-medium text-white hover:text-gray-300 ">
                        CONTACT
                    </a>
                    <x-button href="{{ route('logout') }}" label="LOGOUT" class="text-white hover:text-gray-700"
                        right-icon="logout" />
                </div>
            </div>
        </div>

        <section>
            <div class="items-center px-8 py-12 mx-auto max-w-7xl lg:px-16 md:px-12 lg:py-10">
                {{ $slot }}


            </div>
        </section>

    </div>
</body>

</html>
