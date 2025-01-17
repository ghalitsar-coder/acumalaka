<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    @include('comp.navbar')
    <!-- Main Content -->
    <main class="min-h-screen">
        @yield('content')
    </main>

    <footer class="mt-10 bg-gray-800 p-6 text-center text-white">
    <div class="mb-6 max-w-2xl mx-auto">
        <p class="text-xl font-light leading-relaxed">
            Uncover hidden games, unique stays, and unforgettable experiences. With Wonderlust, every journey leads to discovery.
        </p>
    </div>
    <div class="flex justify-center space-x-4 mb-4">
        <a href="https://facebook.com" target="_blank" class="text-white hover:text-blue-500" aria-label="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M22 12a10 10 0 10-11.9 9.8v-6.93h-2.1v-2.87h2.1v-2.2c0-2.07 1.23-3.2 3.1-3.2.9 0 1.8.16 1.8.16v2h-1.01c-1 0-1.3.63-1.3 1.26v1.78h2.3l-.37 2.87h-1.93V22A10 10 0 0022 12z"/>
            </svg>
        </a>
        <a href="https://twitter.com" target="_blank" class="text-white hover:text-blue-400" aria-label="Twitter">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
            </svg>
        </a>
        <a href="https://instagram.com" target="_blank" class="text-white hover:text-pink-500" aria-label="Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M16 2H8C4.69 2 2 4.69 2 8v8c0 3.31 2.69 6 6 6h8c3.31 0 6-2.69 6-6V8c0-3.31-2.69-6-6-6zm4 14c0 2.21-1.79 4-4 4H8c-2.21 0-4-1.79-4-4V8c0-2.21 1.79-4 4-4h8c2.21 0 4 1.79 4 4v8zm-6-8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6.5a2.5 2.5 0 110-5 2.5 2.5 0 010 5zm4.5-6.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
            </svg>
        </a>
    </div>
    <div class="text-gray-400 text-sm">
        <p>&copy; 2025 Your Website. All rights reserved.</p>
    </div>
</footer>

</body>

</html>

