@extends('layouts.hotel')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold">Reserve a Room: {{ ucfirst($room_type) }}</h1>

        {{-- Show a message if the user has an active reservation --}}
        @if ($hasPendingReservation)
            <div class="mt-4 rounded border border-red-300 bg-red-100 p-4 text-red-600">
                <p>You already have an active reservation. Please check out before making a new reservation.</p>
            </div>
        @else
            {{-- Reservation Form --}}
            <form action="{{ route('reserve-room') }}" method="POST" class="mt-6">
                @csrf
                {{-- Room Selection --}}
                <div class="mb-4">
                    <label for="room_id" class="mb-2 block font-semibold">Select a Room:</label>
                    <select id="room_id" name="room_id" class="w-full rounded border-gray-300" required>
                        <option value="" disabled selected>Choose a room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}"
                                @if ($room->status == 'occupied') disabled @endif>
                                Room {{ $room->room_number }} - ${{ $room->price_per_night }}
                                {{ $room->status == 'Occupied' && 'Occupied' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Service Selection --}}
                <div class="mb-4">
                    <label for="service_id" class="mb-2 block font-semibold">Select a Service:</label>
                    <select id="service_id" name="service_id" class="w-full rounded border-gray-300" required>
                        <option value="" disabled selected>Choose a service</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">
                                {{ ucfirst($service->service_type) }} - ${{ number_format($service->price, 2) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Check-in Date -->
                    <div>
                        <label for="check_in" class="block text-sm font-medium text-gray-700">
                            Check-in Date
                        </label>
                        <div class="relative mt-1">
                            <input type="text"
                                id="check_in"
                                name="check_in"
                                class="block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Select check-in date">
                        </div>
                    </div>

                    <!-- Check-out Date -->
                    <div>
                        <label for="check_out" class="block text-sm font-medium text-gray-700">
                            Check-out Date
                        </label>
                        <div class="relative mt-1">
                            <input type="text"
                                id="check_out"
                                name="check_out"
                                class="block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Select check-out date">
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                        Book Now
                    </button>
                </div>

                @csrf
                <input type="hidden" name="id_room" value="{{ $room->id_room }}">
                @if (Auth::check() && Auth::user()->role === 'guest')
                    <button type="submit" class="mt-2 rounded bg-blue-500 px-4 py-2 text-white">Reserve</button>
                @else
                    <a href="{{ route('login') }}" class="mt-2 rounded bg-gray-500 px-4 py-2 text-white">Login to
                        Reserve</a>
                @endif
            </form>
        @endif
    </div>
@endsection
