<div class="mb-36 mt-40 space-y-14">
    <h2 class='mb-5 text-center text-2xl font-semibold md:text-3xl'>About us</h2>
    <div class="mb-28 grid place-items-center">
        <h1 class='mb-5 text-center text-4xl font-semibold md:text-5xl'>Each space is throughtfully curated to <br />
            spark
            connection and
            create lasting <br /> memories.</h1>
        <div class="flex items-center justify-center gap-x-5 [&>div>h2]:font-semibold">
            <div class="flex flex-col items-center justify-center">

                <button
                    class='rounded-full p-1 transition-all duration-300 hover:border-white hover:bg-black'>
                    <i class="fa-solid fa-hotel p-2 transition-all duration-300 hover:text-white"></i>
                </button>
                <h2>Hotels</h2>
            </div>

            <div class="flex flex-col items-center justify-center">

                <button
                    class='rounded-full p-1 transition-all duration-300 hover:border-white hover:bg-black'>
                    <i class="fa-solid fa-train p-2 transition-all duration-300 hover:text-white"></i>
                </button>
                <h2>Transportasi</h2>
            </div>

            <div class="flex flex-col items-center justify-center">

                <button
                    class='rounded-full p-1 transition-all duration-300 hover:border-white hover:bg-black'>
                    <i class="fa-regular fa-map p-2 transition-all duration-300 hover:text-white"></i>
                </button>
                <h2>Lokasi</h2>
            </div>

            <div class="flex flex-col items-center justify-center">

                <button
                    class='rounded-full p-1 transition-all duration-300 hover:border-white hover:bg-black'>
                    <i class="fa-solid fa-plane p-2 transition-all duration-300 hover:text-white"></i>
                </button>
                <h2>Deportasi</h2>
            </div>

        </div>
    </div>
    <div class="space-y-20">
        <div class="container mx-auto grid min-h-fit grid-cols-[1fr,1fr,1fr] gap-x-5">
            <div class="">
                <div class="h-60 overflow-hidden rounded-2xl bg-blue-300">
                    <img src="{{ asset('img5.jpg') }}" alt=""
                        class='h-full w-full object-cover transition-all duration-300 hover:scale-110 hover:cursor-pointer'>
                </div>
            </div>
            <div class="">
                <div class="h-60 overflow-hidden rounded-2xl bg-blue-300">
                    <img src="{{ asset('img1.jpg') }}" alt=""
                        class='h-full w-full object-cover transition-all duration-300 hover:scale-110 hover:cursor-pointer'>
                </div>
            </div>
            <div class="">
                <div class="h-60 overflow-hidden rounded-2xl bg-blue-300">
                    <img src="{{ asset('img16.jpg') }}" alt=""
                        class='h-full w-full object-cover transition-all duration-300 hover:scale-110 hover:cursor-pointer'>
                </div>
            </div>
        </div>
        <div class="container mx-auto grid grid-cols-[300px,1fr]">
            <div class="">
                <button
                    class='rounded-full border bg-white p-1.5 px-3 font-semibold hover:bg-black hover:text-white'>Nearby</button>
            </div>
            <div class="">
                <h2 class='text-3xl'>Find unique stays, unforgattable experiences, and endless exploration <span
                        class='h-1 w-3'></span> where
                    wanderlust meets
                    wonder, adventure and discovery.</h2>
            </div>

        </div>
    </div>
</div>
