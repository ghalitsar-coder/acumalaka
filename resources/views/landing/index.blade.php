<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <div>
            <a href="{{ route('landing') }}" class="text-xl font-bold">MyApp</a>
        </div>
        <div>
            @auth
                {{-- Jika user sudah login, tampilkan tombol Logout --}}
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
                </form>
            @else
                {{-- Jika user belum login, tampilkan tombol Login/Register --}}
                <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</a>
                <a href="{{ route('register.form') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Register</a>
            @endauth
        </div>
    </nav>
    <!-- Hero Section -->
    <header class="bg-blue-500 text-white">
        <div class="container mx-auto p-8 text-center">
            <h1 class="text-4xl font-bold">Welcome to Our Website</h1>
            <p class="text-lg mt-4">Discover amazing features and great services.</p>
          
        </div>
    </header>

    <!-- Features Section -->
    <section class="container mx-auto p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Our Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-white shadow rounded-lg text-center">
                <h3 class="text-xl font-bold">Feature 1</h3>
                <p class="mt-4 text-gray-600">Description of feature 1.</p>
            </div>
            <div class="p-6 bg-white shadow rounded-lg text-center">
                <h3 class="text-xl font-bold">Feature 2</h3>
                <p class="mt-4 text-gray-600">Description of feature 2.</p>
            </div>
            <div class="p-6 bg-white shadow rounded-lg text-center">
                <h3 class="text-xl font-bold">Feature 3</h3>
                <p class="mt-4 text-gray-600">Description of feature 3.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center p-4">
        <p>&copy; 2025 Your Website. All rights reserved.</p>
    </footer>
</body>
</html>
