<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Truckmart') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <div id="preloader">
            <div class="pulse-container">
                <div class="pulse-bubble pulse-bubble-1"></div>
                <div class="pulse-bubble pulse-bubble-2"></div>
                <div class="pulse-bubble pulse-bubble-3"></div>
            </div>
        </div>
        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts

        <script>
          window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            
            // Añade la clase que inicia la animación de desvanecimiento
            preloader.classList.add('preloader-hidden');
            
            // Después de que la transición termine, oculta el elemento del todo
            setTimeout(() => {
              preloader.style.display = 'none';
            }, 750); // Debe coincidir con la duración de la transición en el CSS
          });
        </script>
        </body>
</html>