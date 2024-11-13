@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Add New guest</h1>
            <a
                href="{{ route('guests.index') }}"
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
            action="{{ route('rooms.store') }}"
            method="POST"
            class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
            @csrf
            <div class="mb-4">
                <label
                    class="mb-2 block text-sm font-bold text-gray-700"
                    for="room_number">
                    Room Number
                </label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    id="room_number"
                    name="room_number"
                    type="number"
                    value="{{ old('room_number') }}"
                    required />
            </div>
            <div class="mb-4">
                <label for="room_type" class="block text-sm font-medium">Room Type</label>
                <select name="room_type" id="room_type"
                    class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    <option value="">Select Room Type</option>
                    <option value="single" {{ old('room_type') == 'single' ? 'selected' : '' }}>Single</option>
                    <option value="double" {{ old('room_type') == 'double' ? 'selected' : '' }}>Double
                    </option>
                    <option value="queen" {{ old('room_type') == 'queen' ? 'selected' : '' }}>Queen</option>
                    <option value="king" {{ old('room_type') == 'king' ? 'selected' : '' }}>King</option>
                </select>
                @error('room_type')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label
                    class="mb-2 block text-sm font-bold text-gray-700"
                    for="capacity">
                    Capacity
                </label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow read-only:bg-slate-200 focus:outline-none"
                    id="capacity"
                    type="number"
                    name="capacity"
                    value="{{ old('capacity') }}"
                    readonly />
            </div>

            <div class="mb-4">
                <label
                    class="mb-2 block text-sm font-bold text-gray-700"
                    for="price_per_night">
                    Price per night
                </label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow read-only:bg-slate-200 focus:outline-none"
                    id="price_per_night"
                    type="price_per_night"
                    name="price_per_night"
                    value="{{ old('price_per_night') }}"
                    readonly />
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
                    type="submit">
                    Create guest
                </button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/autofill.js') }}"></script>

@endsection

