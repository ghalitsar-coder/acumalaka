@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Add New reservation</h1>
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
            action="{{ route('reservation.store') }}"
            method="POST"
            class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
            @csrf

            <div class="mb-4">
                <label for="id_room" class="block text-sm font-medium">Select Room</label>
                <select name="id_room" id="id_room"
                    class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    <option value="">Select a Room</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id_room }}"
                            {{ old('id_room') == $room->id_room ? 'selected' : '' }}
                            {{ $room->status !== 'available' ? 'disabled' : '' }}>
                            #{{ $room->room_number }} - ({{ ucfirst($room->room_type) }}) - ${{ $room->price_per_night }}
                        </option>
                    @endforeach
                </select>

                @error('id_room')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="id_service" class="block text-sm font-medium">Select service</label>
                <select name="id_service" id="id_service"
                    class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    <option value="">Select a service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id_service }}"
                            {{ old('id_service') == $service->id_service ? 'selected' : '' }}>
                            #{{ $service->service_type }} - ${{ $service->price }}
                        </option>
                    @endforeach
                </select>

                @error('id_service')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="id_guest" class="block text-sm font-medium">Select guest</label>
                <select name="id_guest" id="id_guest" class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    <option value="">Select a Guest Member</option>
                    @foreach ($guests as $guest)
                        <option value="{{ $guest->id_guest }}"
                            {{ old('id_guest') == $guest->id_guest ? 'selected' : '' }}
                            {{ $guest->hasActiveReservation ? 'disabled' : '' }}>
                            {{ $guest->first_name }} - {{ $guest->email }}
                            @if ($guest->hasActiveReservation)
                                (Already has a reservation)
                            @endif
                        </option>
                    @endforeach
                </select>

                @error('id_guest')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="id_staff" class="block text-sm font-medium">Select Staff</label>
                <select name="id_staff" id="id_staff" class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    <option value="">Select a Staff Member</option>
                    @foreach ($staffs as $s)
                        <option value="{{ $s->id_staff }}"
                            {{ old('id_staff') == $s->id_staff ? 'selected' : '' }}>
                            {{ $s->first_name }} - {{ $s->position }}
                        </option>
                    @endforeach
                </select>
                @error('id_staff')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="check_in_date" class="block text-sm font-medium">Check-in Date</label>
                <input type="date"
                    name="check_in_date"
                    id="check_in_date"
                    value="{{ old('check_in_date', date('Y-m-d')) }}"
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
                    value="{{ old('check_out_date', date('Y-m-d')) }}"
                    class="mt-1 block w-full rounded-md border border-gray-300">
                @error('check_out_date')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <!-- <div class="mb-4">
                        <label for="status" class="block text-sm font-medium">Payment Status</label>
                        <select name="status" id="status"
                            class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                            <option value="">Select Payment Status</option>
                            <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>confirmed</option>
                            <option value="checked_in" {{ old('status') == 'checked_in' ? 'selected' : '' }}>checked_in
                            </option>
                            <option value="checked_out" {{ old('status') == 'checked_out' ? 'selected' : '' }}>checked_out</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>cancelled</option>
                        </select>
                        @error('status')
        <span class="text-sm text-red-500">{{ $message }}</span>
    @enderror
                    </div> -->

            <div class="flex items-center justify-between">
                <button
                    class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
                    type="submit">
                    Create reservation
                </button>
            </div>
        </form>
    </div>
@endsection

