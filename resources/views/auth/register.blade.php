<!-- resources/views/auth/login.blade.php -->
@extends('layouts.auth')

@section('title', 'Login - Hotel App')

@section('auth-header')
    <p class="mt-2 text-sm text-gray-600">Please sign in to your account</p>
@endsection

@section('auth-content')
    @if ($errors->any())
        <div
            class="mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
            <ul class="list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid h-screen place-items-center">
        <div
            class="w-full max-w-sm -translate-y-10 rounded-lg border border-slate-200/80 bg-white p-5">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700">
                        Name
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="mt-1 block w-full rounded-sm border-gray-300 py-1.5 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>

                <!-- Password -->

                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700">
                        Email Address
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="mt-1 block w-full rounded-sm border-gray-300 py-1.5 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>

                <div class="mb-4">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        class="mt-1 block w-full rounded-sm border-gray-300 py-1.5 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label
                        for="password_confirmation"
                        class="block text-sm font-medium text-gray-700">
                        Password Confirmation
                    </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        class="mt-1 block w-full rounded-sm border-gray-300 py-1.5 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">
                        Phone
                    </label>
                    <input
                        id="phone"
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        required
                        class="mt-1 block w-full rounded-sm border-gray-300 py-1.5 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">
                        Address
                    </label>
                    <textarea
                        id="address"
                        type="text"
                        name="address"
                        value="{{ old('address') }}"
                        class="mt-1 block w-full rounded-sm border-gray-300 py-1.5 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </textarea>
                </div>

                <!-- <label for="role">Role:</label>
                <select name="role" id="role">
                    <option value="guest">Guest</option>
                    <option value="staff">Staff</option>
                </select><br> -->

                <!-- Remember Me -->

                <div class="my-3 flex items-center space-x-1.5">
                    <h3> Sudah punya akun ?</h3> <span class="text-blue-800/80"> <a href="/login">Sign in</a></span>
                </div>

                <div class="flex items-center justify-end">
                    <button
                        type="submit"
                        class="focus:shadow-outline w-full rounded bg-indigo-600 px-4 py-2 font-bold text-white hover:bg-indigo-700 focus:outline-none">
                        Sign up
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

