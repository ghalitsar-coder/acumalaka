<!-- resources/views/auth/login.blade.php -->
@extends('layouts.auth')

@section('title', 'Login - Hotel App')

 
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
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
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

                <!-- Password -->
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

                <!-- Remember Me -->
                <!-- <div class="mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                        <span class="ml-2 text-sm text-gray-600">
                            Remember me
                        </span>
                    </label>
                </div> -->

                <div class="flex items-center space-x-1.5 my-3">
                    <h3> Belum punya akun ?</h3> <span class="text-blue-800/80"> <a href="/register">Sign up</a></span>
                </div>
                <div class="flex items-center justify-end">
                    <button
                        type="submit"
                        class="focus:shadow-outline w-full rounded bg-indigo-600 px-4 py-2 font-bold text-white hover:bg-indigo-700 focus:outline-none">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

