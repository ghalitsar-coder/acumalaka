<!-- resources/views/components/hero.blade.php -->
<div class="relative h-screen">
    <!-- Hero background image -->
    <div class="absolute inset-0">
        <img src="{{ asset('img6.jpg') }}" alt="Hero background" class="h-full w-full object-cover">
        <!-- Overlay with slight gradient -->
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/30"></div>
    </div>

    <!-- Content container -->
    <div class="relative h-full">
        <!-- Include the existing navbar -->
        <div class="flex h-full flex-col justify-between py-10">
            <div class="flex items-center justify-center">

                <div class="container flex items-center justify-between">
                    <h2 class='text-white'>Find private stay work for you</h2>
                    <div class="w-fit rounded-full border border-white p-2">
                        <h2 class='text-white'>Popular 2025</h2>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center">

                <div class="container flex items-center justify-between pb-20">
                    <h1 class="mb-6 text-4xl font-bold text-white md:text-6xl">
                        Stay Unique,<br>
                        Travel Freely
                    </h1>

                    <!-- Search bar container -->
                    <div class="flex flex-col gap-4 rounded-full bg-white/30 py-2 px-3.5 backdrop-blur-sm sm:flex-row">

                        <input
                            type="text"
                            id="destination"
                            placeholder="Search destinations"
                            class="w-full bg-transparent text-white placeholder:text-white ">
                        <button
                            class="self-end rounded-md text-white">
                            Search
                        </button>
                    </div>

                    <!-- Popular tag -->

                </div>
            </div>
        </div>

        <!-- Hero content -->

    </div>
</div>
