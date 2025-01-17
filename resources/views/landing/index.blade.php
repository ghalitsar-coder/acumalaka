 @extends('layouts.hotel')

 @section('content')
     @include('comp.jumbotron')
     @include('comp.aboutus')

     <!-- Card 1 -->
     <div class="container mx-auto grid grid-cols-4 gap-x-5">

         @foreach ($rooms as $room)
             @include('comp.card', ['room' => $room])
         @endforeach

     </div>
 @endsection

 <!-- @forelse ($rooms as $room)
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
@endforelse -->

