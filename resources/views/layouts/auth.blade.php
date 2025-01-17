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
    <main class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        @yield('auth-content')
    </main>
</body>

</html>

