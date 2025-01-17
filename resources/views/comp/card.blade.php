<!-- resources/views/components/feature-card.blade.php -->

<div class="">

    <div class="group relative overflow-hidden rounded-xl">
        <!-- Base image -->
        <img
            src="{{ $room->img }}"
            alt="''"
            class="h-72 w-full object-cover" />

        <!-- Hover overlay - hidden by default, shown on hover -->
        <div class="absolute inset-0 bg-black/30 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
            <div class="flex h-full flex-col justify-between p-6">
                <!-- Top content -->
                <div class='relative bg-red-300'>
                    <p class="absolute inset-0 mb-2 text-lg font-light text-white">{{ $room->desc }}</p>

                </div>
                <div class="mx-auto translate-y-5 ">
                    <a href="{{ url('/rooms/' . $room->room_type) }}">

                        <button
                            class="rounded-full bg-white px-6 py-2 font-medium text-gray-800 backdrop-blur-md transition-all duration-300 hover:bg-white/50">
                            Book
                        </button>
                    </a>
                </div>
                <div class="flex w-fit justify-end gap-2 self-end rounded-full bg-white p-1 px-2.5">

                    <div class="flex items-center justify-between space-x-1 text-sm font-semibold">
                        <h2 class='flex items-center justify-center'> {{ $room->reviews }} <i
                                class="fa-solid fa-star scale-90"></i></h2>
                        <h2 class='text-slate-600'>Reviews</h2>
                    </div>
                    <div class="flex -space-x-2">
                        <img
                            src="{{ asset('img21.jpeg') }}"
                            alt="Reviewer"
                            class="z-[1] h-8 w-8 rounded-full border-2 border-white object-cover" />
                        <img
                            src="{{ asset('img22.jpeg') }}"
                            alt="Reviewer"
                            class="z-[2] h-8 w-8 rounded-full border-2 border-white object-cover" />
                        <img
                            src="{{ asset('img23.jpeg') }}"
                            alt="Reviewer"
                            class="z-[3] h-8 w-8 rounded-full border-2 border-white object-cover" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom info (always visible) -->

    </div>
    <div class="mt-5 flex items-center justify-between">
        <h3 class="text-lg font-medium text-black">{{ ucfirst($room->room_type) }}</h3>
        <h3 class="cursor-pointer rounded-full border bg-white px-2 py-1 font-medium text-black">320+ properties
        </h3>

    </div>
</div>
