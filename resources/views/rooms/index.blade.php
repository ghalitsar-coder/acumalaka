@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="mb-8 text-center text-3xl font-bold">Room List</h1>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-100">
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        ID
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Nomor Kamar
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Tipe Kamar
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Kapasitas
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Harga per Malam
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Status
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

