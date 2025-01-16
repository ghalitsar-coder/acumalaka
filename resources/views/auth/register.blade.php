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

    <div class="grid min-h-screen place-items-center bg-gray-100 p-6">
        <div
        class="w-full max-w-2xl rounded-lg border border-gray-300 bg-white p-6 shadow-md">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="place-self-center items-center border-b-2 border-black w-[400px] h-[55px]">
                    <h2 class="font-serif text-5xl text-center">
                        Register Account
                    </h2>
                </div>

                <!-- Name -->
                <div class="mb-[10px] w-[510px] h-[75px] place-self-center mt-[30px]">
                    <div class="place-self-center">
                        <label
                            for="name"
                            class="block font-serif text-gray-700 text-xl   ">
                            Name
                        </label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            class="mt-[5px] w-[500px] h-[45px]  mx-[5px] rounded-full border-2 px-4"/>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-[10px] w-[510px] h-[75px] place-self-center mt-[30px]">
                    <div class="place-self-center">
                        <label
                            for="email"
                            class="block font-serif text-gray-700 text-xl   ">
                            Email
                        </label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            class="mt-[5px] w-[500px] h-[45px]  mx-[5px] rounded-full border-2 px-4"/>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-[10px] w-[510px] h-[75px] place-self-center mt-[30px]">
                    <div class="place-self-center">
                        <label
                            for="password"
                            class="block font-serif text-gray-700 text-xl   ">
                            Password
                        </label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            value="{{ old('password') }}"
                            required
                            autofocus
                            class="mt-[5px] w-[500px] h-[45px]  mx-[5px] rounded-full border-2 px-4"/>
                    </div>
                </div>

                <!-- Password Confirmation -->
                <div class="mb-[10px] w-[510px] h-[75px] place-self-center mt-[30px]">
                    <div class="place-self-center">
                        <label
                            for="password_confirmation"
                            class="block font-serif text-gray-700 text-xl   ">
                            Password Confirmation
                        </label>
                        <input
                            id="password_confirmation"
                            type="password_confirmation"
                            name="password_confirmation"
                            value="{{ old('password_confirmation') }}"
                            required
                            autofocus
                            class="mt-[5px] w-[500px] h-[45px]  mx-[5px] rounded-full border-2 px-4"/>
                    </div>
                </div>

                <div class="mb-[10px] w-[510px] h-[75px] place-self-center mt-[30px]">
                    <div class="place-self-center">
                        <label
                            for="phone"
                            class="block font-serif text-gray-700 text-xl   ">
                            Phone
                        </label>
                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            required
                            autofocus
                            class="mt-[5px] w-[500px] h-[45px]  mx-[5px] rounded-full border-2 px-4"/>
                    </div>
                </div>

                <div class="mb-[10px] w-[510px] h-[75px] place-self-center mt-[30px]">
                    <div class="place-self-center">
                        <label
                            for="address"
                            class="block font-serif text-gray-700 text-xl   ">
                            Address
                        </label>
                        <input
                            id="address"
                            type="text"
                            name="address"
                            value="{{ old('address') }}"
                            required
                            autofocus
                            class="mt-[5px] w-[500px] h-[45px]  mx-[5px] rounded-full border-2 px-4"/>
                    </div>
                </div>

                <label for="role">Role:</label>
                <select name="role" id="role">
                    <option value="guest">Guest</option>
                    <option value="staff">Staff</option>
                </select><br>

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

