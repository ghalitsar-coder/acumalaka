<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <!-- Header Section -->
    <header class="bg-blue-800 p-6 text-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between">
            <h1 class="text-4xl font-bold">Welcome to Our Hotel</h1>
            <a href="{{ route('reservation.index') }}" class="rounded-full bg-green-500 px-4 py-2 text-white">Make
                Reservation</a>
        </div>
    </header>

    <!-- Main Section -->
    <main class="mx-auto max-w-7xl p-8">
        <div class="text-center">
            <h2 class="mb-4 text-3xl font-semibold">A Luxurious Stay Awaits You</h2>
            <p class="mb-6">Experience the best of comfort and hospitality. Book your stay with us today!</p>

            @auth
                <a href="{{ route('reservation.index') }}" class="rounded-full bg-blue-600 px-6 py-3 text-white">Reserve
                    Now</a>
            @else
                <p class="mb-6 text-gray-700">Please log in to make a reservation.</p>
                <a href="{{ route('login') }}" class="rounded-full bg-green-600 px-6 py-3 text-white">Login</a>
            @endauth
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="bg-gray-900 p-4 text-center text-white">
        <p>&copy; 2024 Hotel Name. All Rights Reserved.</p>
    </footer>
</body>

</html>
