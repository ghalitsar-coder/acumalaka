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

    <div class="grid bg-[url('C:\laragon\www\UAS-PEMMWEB\resources\views\landing\background.png')] bg-cover bg-no-repeat w-full h-[640px]">
        
        <a href="{{ route('landing') }}" class="w-[200px] h-[60px] bg-blue-500 bg-opacity-50 place-self-center rounded-[50px]">
            <p class="font-serif text-5xl text-white place-self-center">MyApp</p>
        </a>
    
        <div
            class="w-[700px] h-[450px] rounded-[35px] border border-slate-200/80 bg-white bg-opacity-75 mx-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="place-self-center items-center border-b-2 border-black w-[320px] h-[55px] mt-[40px]">
                    <h2 class="font-serif text-5xl text-center">
                        Login/Daftar
                    </h2>
                </div>

                <div class="w-[510px] h-[75px] place-self-center mt-[20px]">
                    <div class="place-self-center">
                        <label
                            for="email"
                            class="block font-serif text-gray-700 text-xl">
                            Username
                        </label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="mt-[5px] w-[500px] h-[45px]  mx-[5px] rounded-full border-2 px-4"/>
                    </div>
                </div>
                
                <div class="w-[510px] h-[75px] place-self-center mt-[10px]">
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
                            required
                            class="mt-[5px] w-[500px] h-[45px]  mx-[5px] rounded-full border-2 px-4"/>
                    </div>
                </div>

                <div class="place-self-center mt-[20px]">
                    <button
                        type="submit"
                        class="w-[250px] h-[40px] font-serif text-xl bg-[#FC7447] hover:bg-[#FC6336] rounded-full border-black">
                        Sign in
                    </button>
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

                <div class="flex place-self-center mt-[20px]">
                    <a class="w-[80px] h-[2px] bg-black place-self-center"></a>
                    <p class="font-serif text-sm mx-2">Tidak Punya Akun ?</p>
                    <a class="w-[80px] h-[2px] bg-black place-self-center"></a>
                </div>

                <div class="place-self-center">
                    <p class="w-[250px] h-[40px] text-center font-serif">
                        Ayo Buat Akun MyApplication,
                        Dengan <a href="/register" class="text-blue-500">Daftar</a> Disini.
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection

