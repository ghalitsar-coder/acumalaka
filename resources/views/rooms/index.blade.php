@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <button class="rounded-lg bg-indigo-600 px-2.5 py-1.5 font-semibold text-white shadow-sm">
            <a href="{{ route('rooms.create') }}">Add new Room</a>
        </button>
        <h1 class="mb-8 text-center text-3xl font-bold">Room List</h1>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-100">
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        #
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Room Number
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Room Type
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Capacity
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Price per night
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Status
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $room->room_number }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $room->room_type }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $room->capacity }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $room->price_per_night }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $room->status }}
                        </td>
                        <td class="flex gap-2 px-6 py-4">
                                <a
                                    href="{{ route('rooms.show', $room->id_room) }}"
                                    class="text-blue-600 hover:text-blue-900">
                                    View
                                </a>

                                <a
                                    href="{{ route('rooms.edit', $room->id_room) }}"
                                    class="text-green-600 hover:text-green-900">
                                    Edit
                                </a>
                                <form
                                    action="{{ route('rooms.destroy', $room->id_room) }}"
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
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

