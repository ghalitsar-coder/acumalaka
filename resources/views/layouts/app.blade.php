<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Hotel App</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">

        <div class="grid grid-cols-[256px,1fr]">
            @include('comp.sidebar')
            <!-- Main Content Area -->

            <!-- JavaScript to Toggle Sidebar -->

            <!-- Main Content -->
            <main
                class="max-w-7xl !w-full   mx-auto   sm:px-6 lg:px-8"
            >
                <!-- Flash Messages -->
                @if (session()->has('success'))
                    <div
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                        role="alert"
                    >
                        <span class="block sm:inline">
                            {{ session('success') }}
                        </span>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert"
                    >
                        <span class="block sm:inline">
                            {{ session('error') }}
                        </span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>

        <!-- <script src="./node_modules/preline/dist/preline.js"></script> -->
    </body>
</html>
