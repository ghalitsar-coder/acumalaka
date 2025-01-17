@extends('layouts.hotel')

@section('content')

    <div class="container mx-auto px-4 py-6 sm:px-6 lg:px-8">

        <div
            class="grid  grid-cols-[1fr,1.5fr,1fr] items-center justify-center gap-2.5  ">

            <img src="{{ asset('img5.jpg') }}" alt=""
                class='!h-full w-full rounded-2xl object-cover'>
            <!-- <div class="!h-[500px] gap-5">
                <img src="{{ asset('img6.jpg') }}" alt=""
                    class='!h-1/2 w-full rounded-2xl object-cover'>
                <div class="grid !h-1/2 grid-cols-[1fr,1fr] gap-2.5 space-2.5">
                    <img src="{{ asset('img7.jpg') }}" alt=""
                        class='!h-full w-full rounded-2xl object-cover'>
                    </div>
                </div> -->
                <img src="{{ asset('img11.jpg') }}" alt=""
                    class='!h-full w-full rounded-2xl object-cover'>

            <img src="{{ asset('img16.jpg') }}" alt=""
                class='!h-full w-full rounded-2xl object-cover'>
        </div>

        <div class="rounded-lg bg-white p-6 shadow">
            <h2 class="mb-4 text-2xl font-bold">Book Your Stay</h2>

            {{-- Error Messages --}}
            @if (session('error'))
                <div class="relative mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="relative mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
                    <strong class="font-bold">Please fix the following errors:</strong>
                    <ul class="mt-2 list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('reserve-room') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Check-in Date -->
                    <div>
                        <label for="check_in" class="block text-sm font-medium text-gray-700">
                            Check-in Date
                        </label>
                        <div class="relative mt-1">
                            <input type="text"
                                id="check_in"
                                name="check_in_date"
                                class="@error('check_in_date') border-red-500 @enderror block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Select check-in date"
                                value="{{ old('check_in_date') }}">
                            @error('check_in_date')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
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
                                name="check_out_date"
                                class="@error('check_out_date') border-red-500 @enderror block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Select check-out date"
                                value="{{ old('check_out_date') }}">
                            @error('check_out_date')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Room Selection -->
                    <div>
                        <label for="id_room" class="block text-sm font-medium text-gray-700">
                            Select Room
                        </label>
                        <select name="id_room"
                            id="id_room"
                            class="@error('id_room') border-red-500 @enderror mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Choose a room</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id_room }}"
                                    {{ old('id_room') == $room->id_room ? 'selected' : '' }}>
                                    {{ $room->room_number }} - {{ $room->room_type }}
                                    (${{ number_format($room->price_per_night, 2) }}/night)
                                </option>
                            @endforeach
                        </select>
                        @error('id_room')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Service Selection -->
                    <div>
                        <label for="id_service" class="block text-sm font-medium text-gray-700">
                            Select Service
                        </label>
                        <select name="id_service"
                            id="id_service"
                            class="@error('id_service') border-red-500 @enderror mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Choose a service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id_service }}"
                                    {{ old('id_service') == $service->id_service ? 'selected' : '' }}>
                                    {{ $service->service_type }}
                                    (${{ number_format($service->price, 2) }})
                                </option>
                            @endforeach
                        </select>
                        @error('id_service')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full rounded-md bg-indigo-600 px-4 py-2 text-white transition-colors duration-300 hover:bg-indigo-700">
                        Make Reservation
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Re-initialize flatpickr with old values if they exist
                flatpickr("#check_in", {
                    plugins: [new rangePlugin({
                        input: "#check_out"
                    })],
                    minDate: "today",
                    dateFormat: "Y-m-d",
                    defaultDate: "{{ old('check_in_date') }}", // Set old value if exists
                    disableMobile: "true",
                    monthSelectorType: "static",
                    mode: "range",
                    onChange: function(selectedDates, dateStr, instance) {
                        console.log('Selected dates:', selectedDates);
                    }
                });
            });
        </script>
    @endpush
@endsection
