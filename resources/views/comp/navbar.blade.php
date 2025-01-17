<!-- resources/views/components/navbar.blade.php -->

<nav class="flex items-center justify-center bg-white shadow-lg">
    <div class="container">
        <div class="flex h-16 justify-between">
            <!-- Logo and main navigation -->
            <div class="flex">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ route('landing') }}" class="text-xl font-bold text-blue-600">
                        Kings Hotel
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('landing') }}"
                        class="inline-flex items-center border-b-2 border-blue-500 px-1 pt-1 text-sm font-medium text-gray-900">
                        Home
                    </a>
                    <a href="{{ route('landing') }}"
                        class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                        Rooms
                    </a>
                    <a href="{{ route('landing') }}"
                        class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                        Amenities
                    </a>
                    <a href="{{ route('landing') }}"
                        class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Profile dropdown -->
            @auth
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div x-data="{ open: false }" class="relative ml-3">
                        <div>
                            <button @click="open = !open" type="button"
                                class="m-auto flex rounded-full border border-orange-300 px-2.5 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <h2 class='-translate-y-.5'>

                                    {{ substr(auth()->user()->guest->first_name, 0, 1) }}
                                </h2>
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div x-show="open"
                            @click.away="open = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu">
                            <a href="{{ route('landing') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Your Profile</a>
                            <a href="{{ route('landing') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your
                                Bookings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <a href="{{ route('login') }}"
                        class="m-auto flex rounded-full border px-2.5 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Login
                    </a>
                </div>
            @endguest
            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button @click="mobileMenu = !mobileMenu" type="button"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed -->
                    <svg x-show="!mobileMenu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open -->
                    <svg x-show="mobileMenu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    </div>
</nav>

