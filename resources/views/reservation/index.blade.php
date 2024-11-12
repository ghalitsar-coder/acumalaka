@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <button class="rounded-lg bg-indigo-600 px-2.5 py-1.5 font-semibold text-white shadow-sm">
            <a href="{{ route('reservation.create') }}">Add new Reservation</a>
        </button>

        <h1 class="mb-8 text-center text-3xl font-bold">Reservation List</h1>
        <table
            class="w-full border-collapse rounded-lg border border-gray-300 shadow">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-100 text-left">
                    <th
                        class="px-6 py-4 text-xs font-medium uppercase tracking-wider">
                        #
                    </th>
                    <th
                        class="px-6 py-4 text-xs font-medium uppercase tracking-wider">
                        Guest
                    </th>
                    <th
                        class="px-6 py-4 text-xs font-medium uppercase tracking-wider">
                        Room
                    </th>
                    <th
                        class="px-6 py-4 text-xs font-medium uppercase tracking-wider">
                        Staff
                    </th>
                    <th
                        class="px-6 py-4 text-xs font-medium uppercase tracking-wider">
                        Check-in
                    </th>
                    <th
                        class="px-6 py-4 text-xs font-medium uppercase tracking-wider">
                        Check-out
                    </th>
                    <th
                        class="px-6 py-4 text-xs font-medium uppercase tracking-wider">
                        Total Price
                    </th>
                    <th
                        class="px-6 py-4 text-xs font-medium uppercase tracking-wider">
                        Status
                    </th>
                    <th
                        class="px-6 py-4 text-xs font-medium uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $reservation->guest->first_name }}
                            {{ $reservation->guest->last_name }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $reservation->room->room_number }}
                            {{ $reservation->room->room_type }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $reservation->staff->first_name }}
                            {{ $reservation->staff->last_name }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $reservation->formatted_check_in_date  }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $reservation->formatted_check_out_date  }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $reservation->total_price }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            @if ($reservation->status === 'confirmed')
                                <span
                                    class="inline-block rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">
                                    Confirmed
                                </span>
                            @elseif ($reservation->status === 'checked_in')
                                <span
                                    class="inline-block rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">
                                    Checked In
                                </span>
                            @elseif ($reservation->status === 'checked_out')
                                <span
                                    class="inline-block rounded-full bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-800">
                                    Checked Out
                                </span>
                            @else
                                <span
                                    class="inline-block rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800">
                                    Cancelled
                                </span>
                            @endif
                        </td>
                        <td class="flex gap-2 px-6 py-4">
                            <a
                                href="{{ route('reservation.show', $reservation->id_reservation) }}"
                                class="text-blue-600 hover:text-blue-900">
                                View
                            </a>

                            <a
                                href="{{ route('reservation.edit', $reservation->id_reservation) }}"
                                class="text-green-600 hover:text-green-900">
                                Edit
                            </a>
                            <form
                                action="{{ route('reservation.destroy', $reservation->id_reservation) }}"
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

