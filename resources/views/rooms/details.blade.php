@extends('layouts.hotel')

@section('content')

    <div class="container mx-auto px-4 py-6 sm:px-6 lg:px-8 space-y-20">

        <div
            class="grid grid-cols-[1fr,1.5fr,1fr] items-center justify-center gap-2.5">

            <img src="{{ asset('img5.jpg') }}" alt=""
                class='!h-full w-full rounded-2xl object-cover'>
            <img src="{{ asset('img11.jpg') }}" alt=""
                class='!h-full w-full rounded-2xl object-cover'>

            <img src="{{ asset('img16.jpg') }}" alt=""
                class='!h-full w-full rounded-2xl object-cover'>
        </div>

        <div class="detail-desc">
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


            <div class="grid grid-cols-[1fr,340px] gap-x-5">

                <div class="">

                    <div class="space-y-3">
                        <div class="flex w-fit items-center space-x-1 bg-green-100/70 p-2">
                            <div class="h-3 w-3 rounded-full bg-green-400"></div>
                            <h3 class='text-sm font-semibold text-green-400'>Hidden Gem</h3>
                        </div>
                        <h2 class='text-2xl font-semibold'>House of Oglodi VIII by Mogul Khan</h2>
                        <ul
                            class="flex items-center space-x-5 [&>li]:relative [&>li]:font-semibold [&>li]:text-slate-500 [&>li]:after:absolute [&>li]:after:-right-3.5 [&>li]:after:content-['•']">
                            <li>8 Guest</li>
                            <li>4 Bathroom</li>
                            <li>3 Bedroom</li>
                            <li>Private pool</li>
                        </ul>
                        <div
                            class="flex flex-wrap items-center space-x-5 [&>button>h2]:whitespace-nowrap [&>button]:bg-slate-200/30 [&>button]:text-slate-500">
                            <button class='rounded-2xl p-2 px-2.5 text-sm font-semibold'>
                                <h2>Minimalist</h2>
                            </button>
                            <button class='rounded-2xl p-2 px-2.5 text-sm font-semibold'>
                                <h2>Beach house</h2>
                            </button>
                            <button class='rounded-2xl p-2 px-2.5 text-sm font-semibold'>
                                <h2>Tropic</h2>
                            </button>
                            <button class='rounded-2xl p-2 px-2.5 text-sm font-semibold'>
                                <h2>Private Pool</h2>
                            </button>
                        </div>
                    </div>

                    <!-- resources/views/components/property-tabs.blade.php -->
                    <div x-data="{ activeTab: 'description' }">
                        <!-- Tab headers -->
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex">
                                <button
                                    @click="activeTab = 'description'"
                                    :class="{
                                        'border-blue-500 text-blue-600': activeTab === 'description',
                                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'description'
                                    }"
                                    class="border-b-2 px-6 py-4 text-sm font-medium transition-colors duration-200">
                                    Description
                                </button>

                                <button
                                    @click="activeTab = 'offers'"
                                    :class="{
                                        'border-blue-500 text-blue-600': activeTab === 'offers',
                                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'offers'
                                    }"
                                    class="border-b-2 px-6 py-4 text-sm font-medium transition-colors duration-200">
                                    What we offers
                                </button>

                                <button
                                    @click="activeTab = 'reviews'"
                                    :class="{
                                        'border-blue-500 text-blue-600': activeTab === 'reviews',
                                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'reviews'
                                    }"
                                    class="border-b-2 px-6 py-4 text-sm font-medium transition-colors duration-200">
                                    Reviews
                                </button>

                                <button
                                    @click="activeTab = 'host'"
                                    :class="{
                                        'border-blue-500 text-blue-600': activeTab === 'host',
                                        'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'host'
                                    }"
                                    class="border-b-2 px-6 py-4 text-sm font-medium transition-colors duration-200">
                                    About host
                                </button>
                            </nav>
                        </div>

                        <!-- Tab contents -->
                        <div class="mt-6">
                            <!-- Description Tab -->
                            <div x-show="activeTab === 'description'" x-cloak>
                                <h2 class="mb-4 text-2xl font-semibold">Our house</h2>
                                <p class="leading-relaxed text-gray-600">
                                    This charming 4 bedroom Balinese hut villa, located in a quiet Legian area in Prime
                                    location
                                    is a brand new concept of architecture & elegant interior design. The spacious bedroom,
                                    bath
                                    room and verandah area. Tropical garden view, Each room is beautifully decorated, with
                                    its
                                    own en-suite bathroom and equipped with king size beds, air condition, LED TV, safety
                                    deposit boxes and facilitated with meeting room and also bar and restaurant
                                </p>
                                <p class="mt-4 leading-relaxed text-gray-600">
                                    This brand new Balinese hut JOGLO in Pleaux with spacious room and cozy is perfect for a
                                    Couple, honeymooners or Families looking for a sun-soaked holiday. Located in Pleaux,
                                    You
                                    can also stroll along with Pleaux shops that are within minutes from the apartment. The
                                    holidays here are filled with pleasure, small Lodge with 1000 welcome.
                                </p>
                            </div>

                            <!-- What we offers Tab -->
                            <div x-show="activeTab === 'offers'" x-cloak>
                                <h2 class="mb-4 text-2xl font-semibold">Our Facilities</h2>
                                <ul class="grid grid-cols-2 gap-4">
                                    <li class="flex items-center gap-2">
                                        <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Swimming Pool
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Free WiFi
                                    </li>
                                    <!-- Add more facilities as needed -->
                                </ul>
                            </div>

                            <!-- Reviews Tab -->
                            <div x-show="activeTab === 'reviews'" x-cloak>
                                <h2 class="mb-4 text-2xl font-semibold">Guest Reviews</h2>
                                <!-- Add your reviews content here -->
                                <div class="space-y-4">
                                    <div class="border-b pb-4">
                                        <div class="mb-2 flex items-center">
                                            <div class="flex items-center">
                                                <span class="text-yellow-400">★★★★★</span>
                                            </div>
                                            <span class="ml-2 text-gray-600">Great stay!</span>
                                        </div>
                                        <p class="text-gray-600">Amazing place, will definitely come back!</p>
                                    </div>
                                </div>
                            </div>

                            <!-- About host Tab -->
                            <div x-show="activeTab === 'host'" x-cloak>
                                <h2 class="mb-4 text-2xl font-semibold">About the Host</h2>
                                <!-- Add your host information here -->
                                <div class="flex items-center gap-4">
                                    <div class="h-16 w-16 rounded-full bg-gray-200"></div>
                                    <div>
                                        <h3 class="font-medium">Host Name</h3>
                                        <p class="text-gray-600">Joined in 2023</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('reserve-room') }}" class='p-5 rounded-2xl bg-white h-fit ' method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-2">
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
                            class="w-full rounded-md bg-orange-500 px-4 py-2 text-white transition-colors duration-300 hover:bg-indigo-700">
                            Make Reservation
                        </button>
                    </div>
                </form>
            </div>

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

