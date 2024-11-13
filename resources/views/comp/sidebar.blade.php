<div
    id="sidebar"
    class="sidebar-transition flex h-screen w-64 flex-col bg-slate-700 text-white shadow-md md:translate-x-0">

    <!-- Sidebar Header -->
    <div class="flex items-center justify-center p-4">
        <h1 class="text-2xl font-bold text-white">Brand</h1>
    </div>

    <!-- Navigation Links -->
    <div class="flex-grow overflow-y-auto">
        <ul class="space-y-4  px-4">
            <!-- <li>
                <a
                    class="flex items-center rounded-md p-2 text-white hover:bg-indigo-600">
                    <svg
                        class="mr-3 h-5 w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                    Books
                </a>
            </li> -->
            <li>
                <a
                    href="{{ route('staff.index') }}"
                    class="flex items-center rounded-md p-2 text-white hover:bg-indigo-600">
                    <svg
                        class="mr-3 h-5 w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 9l9 9 9-9"></path>
                    </svg>
                    Staff
                </a>
            </li>
            <li>
                <a
                    href="{{ route('rooms.index') }}"
                    class="flex items-center rounded-md p-2 text-white hover:bg-indigo-600">
                    <svg
                        class="mr-3 h-5 w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 12h14m-7-7v14"></path>
                    </svg>
                    Rooms
                </a>
            </li>
            <li>
                <a
                    href="{{ route('payment.index') }}"
                    class="flex items-center rounded-md p-2 text-white hover:bg-indigo-600">
                    <svg
                        class="mr-3 h-5 w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 5v14m7-7H5"></path>
                    </svg>
                    payments
                </a>
            </li>
            <li>
                <a
                    href="{{ route('reservation.index') }}"
                    class="flex items-center rounded-md p-2 text-white hover:bg-indigo-600">
                    <svg
                        class="mr-3 h-5 w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 5v14m7-7H5"></path>
                    </svg>
                    reservation
                </a>
            </li>
            <li>
                <a
                    href="{{ route('reservation_services.index') }}"
                    class="flex items-center rounded-md p-2 text-white hover:bg-indigo-600">
                    <svg
                        class="mr-3 h-5 w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 5v14m7-7H5"></path>
                    </svg>
                    reservation_services
                </a>
            </li>
            <li>
                <a
                    href="{{ route('guests.index') }}"
                    class="flex items-center rounded-md p-2 text-white hover:bg-indigo-600">
                    <svg
                        class="mr-3 h-5 w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 5v14m7-7H5"></path>
                    </svg>
                    guests
                </a>
            </li>
            <li>
                <a
                    href="{{ route('services.index') }}"
                    class="flex items-center rounded-md p-2 text-white hover:bg-indigo-600">
                    <svg
                        class="mr-3 h-5 w-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 5v14m7-7H5"></path>
                    </svg>
                    services
                </a>
            </li>
            <!-- Add other navigation links here as needed -->
        </ul>
    </div>

    <!-- Auth Section at the Bottom -->
    @auth
        <div class="flex items-center justify-between border-t shadow-sm  p-4">
            <span class="text-white">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">
                    Logout
                </button>
            </form>
        </div>
    @endauth
</div>

