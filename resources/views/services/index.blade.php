@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <button class="rounded-lg bg-indigo-600 px-2.5 py-1.5 font-semibold text-white shadow-sm">
            <a href="{{ route('services.create') }}">Add new Service</a>
        </button>
        <h1 class="mb-8 text-center text-3xl font-bold">Service List</h1>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-100">
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        #
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Service Name
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Description
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Price
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $service->service_type }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $service->description }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $service->price }}
                        </td>
                        <td class="flex gap-2 px-6 py-4">
                            <form
                                action="{{ route('services.destroy', $service->id_service) }}"
                                method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                            <a
                                href="{{ route('services.edit', $service->id_service) }}"
                                class="text-green-600 hover:text-green-900">
                                Edit
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

