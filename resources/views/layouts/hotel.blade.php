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

    <footer class="mt-10 bg-gray-800 p-4 text-center text-white">
        <p>&copy; 2025 Your Website. All rights reserved.</p>
    </footer>
</body>

</html>

