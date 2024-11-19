@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Add New Service</h1>
            <a
                href="{{ route('services.index') }}"
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
            action="{{ route('services.store') }}"
            method="POST"
            class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
            @csrf
            <div class="mb-4">
                <label for="service_type" class="block text-sm font-medium">Room Type</label>
                <select name="service_type" id="service_type"
                    class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    <option value="">Select Room Type</option>
                    <option value="standard" {{ old('service_type') == 'standard' ? 'selected' : '' }}>standard</option>
                    <option value="comfort" {{ old('service_type') == 'comfort' ? 'selected' : '' }}>comfort
                    </option>
                    <option value="luxury" {{ old('service_type') == 'luxury' ? 'selected' : '' }}>luxury</option>
                </select>
                @error('service_type')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label
                    class="mb-2 block text-sm font-bold text-gray-700"
                    for="description">
                    Description
                </label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    id="description"
                    type="text"
                    name="description"
                    value="{{ old('description') }}"
                    required />
            </div>

            <div class="mb-4">
                <label
                    class="mb-2 block text-sm font-bold text-gray-700"
                    for="price">
                    Price
                </label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
                    id="price"
                    type="number"
                    name="price"
                    value="{{ old('price') }}"
                    required />
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
                    type="submit">
                    Create Service
                </button>
            </div>
        </form>
    </div>
@endsection

