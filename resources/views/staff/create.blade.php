@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Add New staff</h1>
            <a
                href="{{ route('staff.index') }}"
                class="text-blue-500 hover:text-blue-700">
                Back to List
            </a>
        </div>

        @if ($errors->any())
            <div
                class="relative mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('staff.store') }}"
            method="POST"
            class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
            @csrf
            <div class="mb-4">
                <label
                    class="mb-2 block text-sm font-bold text-gray-700"
                    for="first_name">
                    Nama Depan
                </label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    id="first_name"
                    type="text"
                    name="first_name"
                    value="{{ old('first_name') }}"
                    required />
            </div>

            <div class="mb-4">
                <label
                    class="mb-2 block text-sm font-bold text-gray-700"
                    for="last_name">
                    Nama Terakhir
                </label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    id="last_name"
                    type="text"
                    name="last_name"
                    value="{{ old('last_name') }}"
                    required />
            </div>

            <div class="mb-4">
                <label
                    class="mb-2 block text-sm font-bold text-gray-700"
                    for="email">
                    Email
                </label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required />
            </div>

            <div class="mb-4">
                <label
                    class="mb-2 block text-sm font-bold text-gray-700"
                    for="position">
                    Posisi
                </label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    id="position"
                    type="text"
                    name="position"
                    value="{{ old('position') }}"
                    required />
            </div>
            <div class="mb-4">
                <label
                    class="mb-2 block text-sm font-bold text-gray-700"
                    for="phone">
                    Nomor telpon
                </label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    id="phone"
                    type="number"
                    name="phone"
                    value="{{ old('phone') }}"
                    required />
            </div>
            <div class="mb-4">
                <label for="hire_date" class="block text-sm font-medium">Hire Date</label>
                <input type="date"
                    name="hire_date"
                    id="hire_date"
                    value="{{ old('hire_date', date('Y-m-d')) }}"
                    class="mt-1 block w-full rounded-md border border-gray-300">
                @error('hire_date')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
                    type="submit">
                    Create Staff
                </button>
            </div>
        </form>
    </div>
@endsection

