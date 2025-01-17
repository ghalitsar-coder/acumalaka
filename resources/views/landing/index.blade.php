 @extends('layouts.hotel')

 @section('content')
     <div class="container">
         <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
             <!-- Card 1 -->

             @forelse ($rooms as $room)
                 <a href="{{ url('/rooms/' . $room->room_type) }}"
                     class="block transition hover:shadow-lg">
                     <div class="overflow-hidden rounded-lg bg-white shadow-lg">
                         <img class="h-48 w-full object-cover" src="/img1.jpg"
                             alt="Room with View">
                         <div class="p-6">
                             <h2 class="mt-2 text-xl font-bold capitalize">
                                 {{ ucfirst($room->room_type) }} Room
                             </h2>
                             <p class="mt-2 text-sm text-gray-500">3 Guests</p>
                         </div>
                     </div>
                 </a>
             @empty
                 <p class="text-center">
                     No rooms available.</p>
             @endforelse

         </div>
     </div>
     <div>
         <!-- Footer -->
         <footer class="mt-10 bg-gray-800 p-4 text-center text-white">
             <p>&copy; 2025 Your Website. All rights reserved.</p>
         </footer>
     </div>
 @endsection

