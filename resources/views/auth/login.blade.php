<!-- resources/views/auth/login.blade.php -->
@extends('layouts.auth')

@section('title', 'Login - Hotel App')

@section('auth-header')
    <p class="mt-2 text-sm text-gray-600">Please sign in to your account</p>
@endsection

@section('auth-content')
    @if ($errors->any())
        <div
            class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4"
        >
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid place-items-center h-screen ">
        <div
            class="max-w-sm w-full -translate-y-10 bg-white rounded-lg border border-slate-200/80 p-5"
        >
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                    >
                        Email Address
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="mt-1 block w-full rounded-sm border-gray-300 shadow-sm py-1.5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                    >
                        Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        class="mt-1 block w-full rounded-sm border-gray-300 shadow-sm py-1.5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    />
                </div>

                <!-- Remember Me -->
                <div class="mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        />
                        <span class="ml-2 text-sm text-gray-600">
                            Remember me
                        </span>
                    </label>
                </div>

                <div class="flex items-center justify-end">
                    <button
                        type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
