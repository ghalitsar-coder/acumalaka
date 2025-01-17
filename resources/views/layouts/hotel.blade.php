<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <main
        class="mx-auto sm:px-6 lg:px-8">

        @yield('content')
    </main>
    </div>

    <!-- <script src="./node_modules/preline/dist/preline.js"></script> -->
    @stack('scripts')
</body>

</html>

