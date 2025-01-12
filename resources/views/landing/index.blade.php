 @extends('layouts.hotel')

 @section('content')
     <nav class="flex items-center justify-between bg-white px-6 py-4 shadow-md">

         <div>
             <a href="{{ route('landing') }}" class="text-xl font-bold">MyApp</a>
         </div>
         <div>
             @auth
                 {{-- Jika user sudah login, tampilkan tombol Logout --}}
                 <form action="{{ route('logout') }}" method="POST" class="inline">
                     @csrf
                     <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600">Logout</button>
                 </form>
             @else
                 {{-- Jika user belum login, tampilkan tombol Login/Register --}}
                 <a href="{{ route('login') }}" class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">Login</a>
                 <a href="{{ route('register.form') }}"
                     class="rounded bg-green-500 px-4 py-2 text-white hover:bg-green-600">Register</a>
             @endauth
         </div>
     </nav>
     <!-- Hero Section -->
     <header class="bg-blue-500 text-white">
         <div class="container mx-auto p-8 text-center">
             <h1 class="text-4xl font-bold">Welcome to Our Website</h1>
             <p class="mt-4 text-lg">Discover amazing features and great services.</p>

         </div>
     </header>

     <!-- Features Section -->
     <section class="container mx-auto p-8">
         <h2 class="mb-6 text-center text-2xl font-bold">Our Features</h2>
         <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
             <div class="rounded-lg bg-white p-6 text-center shadow">
                 <h3 class="text-xl font-bold">Feature 1</h3>
                 <p class="mt-4 text-gray-600">Description of feature 1.</p>
             </div>
             <div class="rounded-lg bg-white p-6 text-center shadow">
                 <h3 class="text-xl font-bold">Feature 2</h3>
                 <p class="mt-4 text-gray-600">Description of feature 2.</p>
             </div>
             <div class="rounded-lg bg-white p-6 text-center shadow">
                 <h3 class="text-xl font-bold">Feature 3</h3>
                 <p class="mt-4 text-gray-600">Description of feature 3.</p>
             </div>
         </div>
     </section>
     <div>
         <h1 class="mb-6 text-3xl font-bold">Available Room Types</h1>
         <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
             @forelse ($rooms as $room)
                 <a href="{{ url('/rooms/' . $room->room_type) }}"
                     class="block rounded border p-4 shadow transition hover:shadow-lg">
                     <img
                         src="{{ $room->image ?? 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8&ixlib=rb-1.2.1&q=80&w=400' }}"
                         alt="{{ $room->room_type }} room"
                         class="h-48 w-full rounded object-cover" />
                     <h2 class="mt-2 text-xl font-bold capitalize">
                         {{ ucfirst($room->room_type) }} Room
                     </h2>
                 </a>
             @empty
                 <p class="text-center">No rooms available.</p>
             @endforelse
         </div>
     </div>

     <a href="{{ route('dashboard-apa-aja-dokter') }}"> kita mau kemana dashboard dokter </a>

     <!-- Footer -->
     <footer class="bg-gray-800 p-4 text-center text-white">
         <p>&copy; 2025 Your Website. All rights reserved.</p>
     </footer>
 @endsection

