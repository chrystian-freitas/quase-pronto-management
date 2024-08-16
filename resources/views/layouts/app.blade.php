<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
    <body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')
        @include('components.toast')

        <div class="flex w-full flex-wrap">
            <div class="flex row flex-grow sm:max-w-sm" id="aside-left">
                <div id="menu" class="flex-grow bg-gray-800 text-white grow-1 h-screen">
                    <livewire:menu />
                </div>
                <a id="toggle-menu"
                   class="flex items-center grow-0 cursor-pointer p-0.5 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <span id="svg-open">
                    <svg class="w-4 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m15 19-7-7 7-7"/>
                    </svg>
                </span>
                    <span id="svg-close" class="hidden">
                    <svg class="w-4 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m9 5 7 7-7 7"/>
                    </svg>
                </span>
                </a>
            </div>

            <!-- Page Content -->
            <main id="content" class="max-w-full flex-1 bg-gray-200 p-4">
                {{ $slot }}
            </main>
            @livewireScripts
        </div>
    </div>
        <script>
            const toggleButton = document.getElementById('toggle-menu');
            const menu = document.getElementById('menu');
            const aside = document.getElementById('aside-left');
            const svgOpen = document.getElementById('svg-open');
            const svgClose = document.getElementById('svg-close');

            function toggleMenu() {
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                    // Show open SVG and hide close SVG
                    svgOpen.classList.remove('hidden');
                    aside.classList.add('sm:max-w-sm');
                    svgClose.classList.add('hidden');
                    aside.classList.add('flex-grow');

                } else {
                    // Show close SVG and hide open SVG
                    svgOpen.classList.add('hidden');
                    aside.classList.remove('sm:max-w-sm');
                    menu.classList.add('hidden');
                    svgOpen.classList.remove('max-w-sm');
                    svgClose.classList.remove('hidden');
                    aside.classList.remove('flex-grow');
                }
            }

            toggleButton.addEventListener('click', function () {
                toggleMenu();
            });


        </script>
    </body>
</html>
