 @extends('layouts.hotel')

 @section('content')
    <div class="bg-[url('/public/background.png')] bg-cover bg-no-repeat w-full h-[640px]">
        <nav class="w-[1200px] h-[55px] flex place-self-center justify-between border-b-4 border-black">
            <div class="ml-[20px] place-self-center">
                <a href="{{ route('landing') }}" class="text-xl font-bold text-white">MyApp</a>
            </div>
            <div class="mr-[20px] place-self-center">
                @auth
                    {{-- Jika user sudah login, tampilkan tombol Logout --}}
                    <div class="text-white font-serif flex">
                        <div class="mx-1">
                            <form action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                                <button type="submit" class="w-[70px] rounded-full border-2 border-red-500 bg-red-500 bg-opacity-20 text-white hover:bg-opacity-50">
                                    Logout</button>
                            </form>
                        </div>

                        <div class="w-[200px] mx-1 bg-blue-500 bg-opacity-20 rounded-full border-2 border-blue-500 text-center hover:bg-opacity-50">
                            <a href="#" class ="">
                                Nama yg login
                            </a>
                        </div>
                    </div>
                @else
                    {{-- Jika user belum login, tampilkan tombol Login/Register --}}
                    <div class="text-white font-serif flex">
                        <a href="{{ route('login') }}"
                        class="w-[100px] mx-1 rounded-full border-2 border-gray-500 bg-gray-500 bg-opacity-20 text-center text-white hover:bg-opacity-50">
                            Login</a>
                        <a href="{{ route('register.form') }}"
                        class="w-[100px] mx-1 bg-blue-500 rounded-full border-2 border-blue-500 text-center hover:bg-blue-600 hover:border-blue-600">
                            Daftar</a>
                    </div>
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
            <a href="" class="py-1 inline-block h-[30px] w-[150px] rounded-full bg-blue-900 text-center text-sm text-white hover:bg-blue-950 focus:outline-none focus:ring focus:ring-blue-900">
                about us</a>
            <a href="" class="py-1 inline-block h-[30px] w-[150px] rounded-full bg-blue-900 text-center text-sm text-white hover:bg-blue-950 focus:outline-none focus:ring focus:ring-blue-900">
                room list</a>
            <a href="" class="py-1 inline-block h-[30px] w-[150px] rounded-full bg-blue-900 text-center text-sm text-white hover:bg-blue-950 focus:outline-none focus:ring focus:ring-blue-900">
                your booking</a>
        </div>

        <!-- Label -->
        <form action="{{route('detail-reservasi')}}" class="mt-[80px]">
            <div class="flex items-center ">
                <a class="ml-[190px] block text-base font-serif text-white">
                    Pilih Kamar :</a>
                <a class="ml-[210px] block text-base font-serif text-white">
                    Check in Date :</a>
                <a class="ml-[60px] block text-base font-serif text-white">
                    Check out Date :</a>
                <a class="ml-[50px] block text-base font-serif text-white">
                    Guest(s) :</a>
            </div>

            <!-- Reseration Nav. -->
            <div class="container h-[80px] w-[1150px] place-self-center rounded-full bg-[#D9D9D9]">
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

                    <button type="submit" class="font-serif text-white font-bold text-lg mx-1 h-[72px] w-[200px] rounded-full border-4 border-black bg-[#FC7447] hover:bg-[#FC6336]">
                        Reservasion
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="px-[90px]">
        <section class="container">
            <div class="border-b-2 border-black w-[400px] h-[52px] mt-[30px]">
                <h2 class="font-serif text-4xl text-center">
                    Available Room Types</h2>
            </div>

            <div class="mt-[30px] mx-[30px]">
                <div class="grid grid-cols-1 gap-[5px] md:grid-cols-2 lg:grid-cols-4">
                    @forelse ($rooms as $room)
                        <a href="{{ url('/rooms/' . $room->room_type) }}"
                            class="block rounded border p-4 shadow transition hover:shadow-lg">
                            <img
                                src="{{ $room->image ?? 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWx8ZW58MHx8MHx8&ixlib=rb-1.2.1&q=80&w=400' }}"
                                alt="{{ $room->room_type }} room"
                                class="h-48 w-full rounded object-cover">

                            <h2 class="mt-2 text-xl font-bold capitalize">
                                {{ ucfirst($room->room_type) }} Room
                            </h2>
                        </a>
                    @empty
                        <p class="text-center">
                            No rooms available.</p>
                    @endforelse
                </div>
            </div>
        </section>
        
        <div class="container mt-[50px]">
            <div class="border-b-2 border-black w-[400px] h-[63px] mt-[50px] place-self-center">
                <h2 class="font-serif text-6xl text-center">
                    Our Facilities</h2>
            </div>
            
            <div class="container mt-[30px] flex items-center justify-center">
                <div class="bg-[url('/public/dummyImg.jpg')] bg-cover bg-no-repeat w-[500px] h-[500px] rounded">
                </div>

                <div class="w-[700px] h-[500px] font-serif flex items-center justify-center ml-[30px] ">
                    <div class="">
                        <h3 class="text-3xl">
                            Lorem ipsum dolor sit amet,
                        </h3>
                        <p class="text-lg">
                            consectetur adipiscing elit. Quisque laoreet nulla et dui 
                            pretium, non commodo dolor tempus. Mauris nunc lectus, 
                            scelerisque in lacus in, ultricies pharetra mauris. 
                            Aliquam turpis felis, ornare eget fermentum sit amet, 
                            aliquam ut magna. In in commodo magna. Proin enim purus, 
                            vulputate sit amet pharetra nec, pellentesque in odio. 
                            Fusce eu quam lobortis, luctus ante porttitor, posuere 
                            erat. <a href = "#" class="text-blue-500 hover:text-blue-600">Lihat Selengkapnya.....</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="container mt-[30px] flex items-center justify-center">
                <div class="w-[700px] h-[500px] font-serif flex items-center justify-center ml-[30px] ">
                    <div class="">
                        <h3 class="text-3xl">
                            Lorem ipsum dolor sit amet,
                        </h3>
                        <p class="text-lg">
                            consectetur adipiscing elit. Quisque laoreet nulla et dui 
                            pretium, non commodo dolor tempus. Mauris nunc lectus, 
                            scelerisque in lacus in, ultricies pharetra mauris. 
                            Aliquam turpis felis, ornare eget fermentum sit amet, 
                            aliquam ut magna. In in commodo magna. Proin enim purus, 
                            vulputate sit amet pharetra nec, pellentesque in odio. 
                            Fusce eu quam lobortis, luctus ante porttitor, posuere 
                            erat. <a href = "#" class="text-blue-500 hover:text-blue-600">Lihat Selengkapnya.....</a>
                        </p>
                    </div>
                </div>

                <div class="bg-[url('/public/dummyImg.jpg')] bg-cover bg-no-repeat w-[500px] h-[500px] rounded">
                </div>
            </div>

            <div class="container mt-[30px] flex items-center justify-center">
                <div class="bg-[url('/public/dummyImg.jpg')] bg-cover bg-no-repeat w-[500px] h-[500px] rounded">
                </div>

                <div class="w-[700px] h-[500px] font-serif flex items-center justify-center ml-[30px] ">
                    <div class="">
                        <h3 class="text-3xl">
                            Lorem ipsum dolor sit amet,
                        </h3>
                        <p class="text-lg">
                            consectetur adipiscing elit. Quisque laoreet nulla et dui 
                            pretium, non commodo dolor tempus. Mauris nunc lectus, 
                            scelerisque in lacus in, ultricies pharetra mauris. 
                            Aliquam turpis felis, ornare eget fermentum sit amet, 
                            aliquam ut magna. In in commodo magna. Proin enim purus, 
                            vulputate sit amet pharetra nec, pellentesque in odio. 
                            Fusce eu quam lobortis, luctus ante porttitor, posuere 
                            erat. <a href = "#" class="text-blue-500 hover:text-blue-600">Lihat Selengkapnya.....</a>
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div>
        <!-- Footer -->
        <footer class="bg-gray-800 p-4 text-center text-white mt-10">
            <p>&copy; 2025 Your Website. All rights reserved.</p>
        </footer>
    </div>
 @endsection

