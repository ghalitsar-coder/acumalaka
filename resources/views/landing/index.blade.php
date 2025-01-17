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
     @if (session('success'))
         <div class="mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700">
             {{ session('success') }}
         </div>
     @endif
     <!-- Hero Section -->
     <header class="relative bg-blue-500 text-white overflow-hidden">
        <div class="container mx-auto p-8 text-center relative z-10">
            <h1 class="text-4xl font-bold">Welcome to Our Hotel</h1>
            <p class="mt-4 text-lg">Quality time is good behavior with our service.</p>
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
                         src="{{'https://picsum.photos/seed/picsum/200/300' }}"
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

    <section class="container mx-auto p-8">
        <h2 class="mb-6 text-center text-2xl font-bold">Our Facilities</h2>
        <div class="space-y-12">
            <!-- Facility 1 -->
            <div class="flex flex-col items-center md:flex-row md:space-x-6">
                <div class="md:w-1/2">
                    <img src="https://picsum.photos/seed/picsum/200/300" alt="Gym Facility" class="w-full max-w-xs max-h-48 mx-auto rounded-lg object-cover">
                </div>
                <div class="mt-4 md:mt-0 md:w-1/2">
                    <h3 class="text-xl font-bold">GYM</h3>
                    <p class="mt-4 text-gray-600">
                    Experience the ultimate fitness journey at our modern and fully-equipped gym. Designed for your comfort and convenience, our gym features state-of-the-art equipment to help you maintain your workout routine during your stay. Whether you're looking for light exercises, strength training, or cardio sessions, our facility is tailored to meet all your fitness needs. Enjoy your workout in a serene environment that inspires energy and keeps you motivated throughout the day.</p>
                </div>
             </div>
            <!-- Facility 2 -->
            <div class="flex flex-col items-center md:flex-row-reverse md:space-x-reverse md:space-x-6">
                <div class="md:w-1/2">
                    <img src="https://picsum.photos/seed/picsum/200/300" alt="Spa Facility" class="w-full max-w-xs max-h-48 mx-auto rounded-lg object-cover">
                </div>
                <div class="mt-4 md:mt-0 md:w-1/2">
                    <h3 class="text-xl font-bold">SPA</h3>
                    <p class="mt-4 text-gray-600">
                    Indulge in a world of relaxation and rejuvenation at our luxurious spa. Let the stress melt away as you enjoy our wide range of treatments, including soothing massages, revitalizing facials, and body therapies designed to pamper you from head to toe. With a serene ambiance and professional therapists, our spa offers the perfect escape to restore your mind, body, and soul. Treat yourself to a truly blissful experience during your stay.</p>
                </div>
            </div>
            <!-- Facility 3 -->
            <div class="flex flex-col items-center md:flex-row md:space-x-6">
                <div class="md:w-1/2">
                    <img src="https://picsum.photos/seed/picsum/200/300" alt="Pool Facility" class="w-full max-w-xs max-h-48 mx-auto rounded-lg object-cover">
                </div>
                <div class="mt-4 md:mt-0 md:w-1/2">
                    <h3 class="text-xl font-bold">Pool</h3>
                    <p class="mt-4 text-gray-600">
                    Dive into relaxation and leisure at our stunning pool, the perfect spot to unwind and refresh. Surrounded by a serene atmosphere, our pool offers a haven for both relaxation and fun. Whether you're taking a calming swim, lounging by the water, or enjoying quality time with family and friends, our pool is designed to enhance your stay with comfort and tranquility. Let the soothing waters provide a refreshing escape from your daily routine.</p>
                </div>
            </div>
            <!-- Facility 4 -->
            <div class="flex flex-col items-center md:flex-row-reverse md:space-x-reverse md:space-x-6">
                <div class="md:w-1/2">
                    <img src="https://picsum.photos/seed/picsum/200/300" alt="Spa Facility" class="w-full max-w-xs max-h-48 mx-auto rounded-lg object-cover">
                </div>
                <div class="mt-4 md:mt-0 md:w-1/2">
                    <h3 class="text-xl font-bold">Restaurant</h3>
                    <p class="mt-4 text-gray-600">
                    Delight your taste buds with an exceptional dining experience at our restaurant. Offering a diverse menu of local and international cuisines, every dish is prepared with the finest ingredients to ensure quality and flavor. Whether you're enjoying a hearty breakfast, a leisurely lunch, or a romantic dinner, our restaurant provides a warm and inviting ambiance. Pair your meals with our selection of beverages and let us take you on a culinary journey that elevates your stay.</p>
                </div>
            </div>
            <!-- Facility 5 -->
            <div class="flex flex-col items-center md:flex-row md:space-x-6">
                <div class="md:w-1/2">
                    <img src="https://picsum.photos/seed/picsum/200/300" alt="Pool Facility" class="w-full max-w-xs max-h-48 mx-auto rounded-lg object-cover">
                </div>
                <div class="mt-4 md:mt-0 md:w-1/2">
                    <h3 class="text-xl font-bold">Lounge Bar</h3>
                    <p class="mt-4 text-gray-600">
                    Unwind and socialize in style at our elegant lounge bar. Offering a relaxed ambiance, it’s the perfect place to enjoy a signature cocktail, fine wine, or premium spirits. Whether you’re catching up with friends, holding casual meetings, or simply savoring some quiet time, our lounge bar provides a sophisticated setting for every occasion. Pair your drink with our delightful selection of light bites and let the atmosphere elevate your evening.</p>
                </div>
            </div>
            <!-- Facility 4 -->
            <div class="flex flex-col items-center md:flex-row-reverse md:space-x-reverse md:space-x-6">
                <div class="md:w-1/2">
                    <img src="https://picsum.photos/seed/picsum/200/300" alt="Spa Facility" class="w-full max-w-xs max-h-48 mx-auto rounded-lg object-cover">
                </div>
                <div class="mt-4 md:mt-0 md:w-1/2">
                    <h3 class="text-xl font-bold">Playground</h3>
                    <p class="mt-4 text-gray-600">
                    Bring joy to your little ones at our vibrant and safe playground. Designed with fun and creativity in mind, the playground offers a variety of activities to keep children entertained for hours. From slides to climbing frames and interactive games, it's the perfect space for kids to play, explore, and make happy memories. Let them enjoy their time while you relax, knowing they are in a secure and enjoyable environment.</p>
                </div>
            </div>
        </div>
    </section>

     <!-- Footer -->
     <footer class="bg-gray-800 p-6 text-center text-white">
        <div class="mb-4">
            <p class="text-lg font-semibold">
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
        <div>
            <p>&copy; 2025 Your Website. All rights reserved.</p>
        </div>
    </footer>

 @endsection

