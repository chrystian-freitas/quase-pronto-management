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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
    <body class="font-sans antialiased">
    @livewireScripts
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <div class="flex">
            <div id="menu" class="flex-none bg-gray-800 text-white  h-screen -translate-x-full w-0 invisible">
                @include('components.layout.menu')
            </div>
            <a id="toggle-menu"
               class="flex items-center cursor-pointer p-0.5 text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <span id="svg-open" class="hidden">
                    <svg class="w-4 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m15 19-7-7 7-7"/>
                    </svg>
                </span>
                <span id="svg-close">
                    <svg class="w-4 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m9 5 7 7-7 7"/>
                    </svg>
                </span>
            </a>
            <!-- Page Content -->
            <main id="content" class="flex-1 bg-gray-200 p-4">
                {{ $slot }}
            </main>
        </div>
    </div>
        <script>
            const toggleButton = document.getElementById('toggle-menu');
            const menu = document.getElementById('menu');
            const svgOpen = document.getElementById('svg-open');
            const svgClose = document.getElementById('svg-close');

            function toggleMenu() {
                if (menu.classList.contains('-translate-x-full')) {
                    menu.classList.remove('-translate-x-full');
                    menu.classList.remove('w-0');
                    menu.classList.remove('invisible');
                    // Show open SVG and hide close SVG
                    svgOpen.classList.remove('hidden');
                    svgClose.classList.add('hidden');

                } else {
                    menu.classList.add('-translate-x-full');
                    menu.classList.add('w-0');
                    menu.classList.add('invisible');

                    // Show close SVG and hide open SVG
                    svgOpen.classList.add('hidden');
                    svgClose.classList.remove('hidden');
                }
            }

            toggleButton.addEventListener('click', function () {
                toggleMenu();
            });

            toggleMenu();

        </script>
    </body>
</html>
