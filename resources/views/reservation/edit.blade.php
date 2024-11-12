@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Edit reservation</h1>
            <a
                href="{{ route('reservation.index') }}"
                class="text-blue-500 hover:text-blue-700">
                Back to List
            </a>
        </div>

        @if ($errors->any())
            <div
                class="relative mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('reservation.update', $reservation->id_reservation) }}"
            method="POST"
            class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="id_room" class="block text-sm font-medium">Select room</label>
                <select name="id_room" id="id_room" class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id_room }}"
                            {{ $reservation->id_room == $room->id_room ? 'selected' : '' }}>
                            #{{ $room->id_room }} - {{ $room->room_type ?? 'Missing Type' }}
                            (${{ $room->price_per_night }})
                            @if ($reservation->id_room == $room->id_room)
                                (Reserved)
                            @else
                                (Available)
                            @endif
                        </option>
                    @endforeach
                </select>

                @error('id_room')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-4">
                <label for="id_staff" class="block text-sm font-medium">Select Staff</label>
                <select name="id_staff" id="id_staff" class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    @foreach ($staffs as $s)
                        <option value="{{ $s->id_staff }}"
                            {{ $reservation->id_staff == $s->id_staff ? 'selected' : '' }}>
                            {{ $s->first_name }} - {{ $s->position }}
                        </option>
                    @endforeach
                </select>

                @error('id_staff')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="id_guest" class="block text-sm font-medium">Select Guest</label>
                <select name="id_guest" id="id_guest" class="mt-1 block w-full rounded-md border border-gray-300 py-1.5"
                    required>
                    <option value="">Select a Guest Member</option>
                    @foreach ($guests as $guest)
                        <option value="{{ $guest->id_guest }}"
                            {{ $reservation->id_guest == $guest->id_guest ? 'selected' : '' }}
                            {{ $guest->hasActiveReservation ? ($reservation->id_guest != $guest->id_guest ? 'disabled' : '') : '' }}>
                            {{ $guest->first_name }} - {{ $guest->email }}
                            @if ($guest->hasActiveReservation)
                                @if ($reservation->id_guest == $guest->id_guest)
                                    (Reserved)
                                @else
                                    Already has reservation 
                                @endif
                            @endif
                        </option>
                    @endforeach
                </select>
                @error('id_guest')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="check_in_date" class="block text-sm font-medium">Check-in Date</label>
                <input type="date"
                    name="check_in_date"
                    id="check_in_date"
                    value="{{ $reservation->check_in_date }}"
                    class="mt-1 block w-full rounded-md border border-gray-300">
                @error('check_in_date')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="check_out_date" class="block text-sm font-medium">Check-out Date</label>
                <input type="date"
                    name="check_out_date"
                    id="check_out_date"
                    value="{{ $reservation->check_out_date }}"
                    class="mt-1 block w-full rounded-md border border-gray-300">
                @error('check_out_date')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
                    type="submit">
                    Update reservation
                </button>
            </div>
        </form>
    </div>
@endsection

