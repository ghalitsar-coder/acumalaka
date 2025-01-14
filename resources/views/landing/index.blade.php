 @extends('layouts.hotel')

 @section('content')
    <div class="bg-[url('C:\laragon\www\UAS-PEMMWEB\resources\views\landing\background.webp')] bg-cover bg-no-repeat w-[full] h-[640px]">
        <nav class="ml-[110px] mr-[110px] flex items-center justify-between border-b-4 border-black px-6 py-4">
            <div>
                <a href="{{ route('landing') }}" class="text-xl font-bold">MyApp</a>
            </div>
            <div>
                @auth
                    {{-- Jika user sudah login, tampilkan tombol Logout --}}
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                        <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600">
                            Logout</button>
                    </form>
                @else
                    {{-- Jika user belum login, tampilkan tombol Login/Register --}}
                    <a href="{{ route('login') }}"
                    class="rounded-[25px] border-2 border-white bg-transparent px-8 py-2 font-bold text-white hover:bg-black hover:bg-opacity-10 focus:outline-none focus:ring focus:ring-white">
                        Login</a>
                    <a href="{{ route('register.form') }}"
                    class="rounded-[25px] border-2 border-blue-500 bg-blue-500 px-8 py-2 font-bold text-white hover:bg-blue-600  hover:border-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                        Daftar</a>
                @endauth
            </div>
        </nav>
        <!-- Header -->
        <header class="text-center">
            <div class="container mt-[60px]">
               <h1 class="text-7xl font-serif text-white">
                Welcome to Our Website</h1>
               <p class="mt-[20px] text-3xl font-serif text-white">
                Discover amazing features and great services.</p>
            </div>
        </header>

        <!-- Button Action -->
        <div class="mt-[60px] container text-center">
            <a href="" class="py-1 inline-block h-[30px] w-[150px] rounded-[25px] bg-blue-900 text-center text-sm text-white hover:bg-blue-950 focus:outline-none focus:ring focus:ring-blue-900">
                about us</a>
            <a href="" class="py-1 inline-block h-[30px] w-[150px] rounded-[25px] bg-blue-900 text-center text-sm text-white hover:bg-blue-950 focus:outline-none focus:ring focus:ring-blue-900">
                room list</a>
            <a href="" class="py-1 inline-block h-[30px] w-[150px] rounded-[25px] bg-blue-900 text-center text-sm text-white hover:bg-blue-950 focus:outline-none focus:ring focus:ring-blue-900">
                payment</a>
            <a href="" class="py-1 inline-block h-[30px] w-[150px] rounded-[25px] bg-blue-900 text-center text-sm text-white hover:bg-blue-950 focus:outline-none focus:ring focus:ring-blue-900">
                your booking</a>
        </div>

        <!-- Label -->
        <form action="#" class="mt-[80px]">
            <div class="flex items-center">
                <a class="ml-[140px] block text-base font-serif text-white">
                    Pilih Kamar :</a>
                <a class="ml-[210px] block text-base font-serif text-white">
                    Check in Date :</a>
                <a class="ml-[60px] block text-base font-serif text-white">
                    Check out Date :</a>
                <a class="ml-[50px] block text-base font-serif text-white">
                    Guest(s) :</a>
            </div>

            <!-- Reseration Nav. -->
            <div class="container h-[80px] w-[1150px] place-self-center rounded-[35px] bg-[#D9D9D9]">
                <div class="flex items-center px-1 py-1">
                    <select name="id_room" id="id_room"
                    class="h-[72px] w-[320px] rounded-s-full border-4 border-black px-[20px]">
                        <option value="">
                            Select a room</option>
                    </select>
                    <input type="Date" name="check-in" id="check-in"
                    class="h-[72px] w-[160px] border-4 border-black px-[15px]">
                    <input type="Date" name="check-out" id="check-out"
                    class="h-[72px] w-[160px] border-4 border-black px-[15px]">
                    <input name="person" id="person" value="1 Orang"
                    class="h-[72px] w-[320px] rounded-e-full border-4 border-black px-[20px]">

                    <button type="submit" class="font-serif text-white font-bold text-lg mx-1 h-[72px] w-[200px] rounded-[35px] border-4 border-black bg-[#FC7447] hover:bg-[#FC6336]">
                        Reservasion
                    </button>
                </div>
            </div>
        </form>

    </div>
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

     <!-- Footer -->
     <footer class="bg-gray-800 p-4 text-center text-white">
         <p>&copy; 2025 Your Website. All rights reserved.</p>
     </footer>
 @endsection

