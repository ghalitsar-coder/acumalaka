@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Book Details</h1>
            <a href="{{ route('guests.index') }}" class="text-blue-500 hover:text-blue-700">Back to List</a>
        </div>

        <div class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
            <div class="mb-4">
                <h2 class="mb-2 text-sm font-bold text-gray-700">first_name</h2>
                <p class="text-gray-700">{{ $guest->first_name }}</p>
            </div>

            <div class="mb-4">
                <h2 class="mb-2 text-sm font-bold text-gray-700">last_name</h2>
                <p class="text-gray-700">{{ $guest->last_name }}</p>
            </div>

            <div class="mb-4">
                <h2 class="mb-2 text-sm font-bold text-gray-700">email</h2>
                <p class="text-gray-700">{{ $guest->email }}</p>
            </div>

            <div class="mb-4">
                <h2 class="mb-2 text-sm font-bold text-gray-700">phone</h2>
                <p class="text-gray-700">{{ $guest->phone }}</p>
            </div>

            <div class="mb-4">
                <h2 class="mb-2 text-sm font-bold text-gray-700">address</h2>
                <p class="text-gray-700">{{ $guest->address }}</p>
            </div>

        </div>
    </div>
@endsection 
