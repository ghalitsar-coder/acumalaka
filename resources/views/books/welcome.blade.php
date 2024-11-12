<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
            rel="stylesheet"
        />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Add this temporarily for testing -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                console.log('Vite assets loaded:', document.styleSheets);
            });
        </script>
    </head>
    <body>
        <h1 class="text-8xl text-red-300">macan tutul</h1>
    </body>
</html>
