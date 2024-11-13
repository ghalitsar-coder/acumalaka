@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-6">
            <a
                href="{{ route('payment.create') }}"
                class="mt-4 inline-block rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                Add New Payment
            </a>
        </div>
        <h1 class="mb-8 text-center text-3xl font-bold">Payment List</h1>
        <table
            class="w-full border-collapse rounded-lg border border-gray-300 shadow">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-100 text-left">
                    <th
                        class="px-6 py-4 text-sm font-medium uppercase tracking-wider text-gray-900">
                        #
                    </th>
                    <th
                        class="px-6 py-4 text-sm font-medium uppercase tracking-wider text-gray-900">
                        Reservation
                    </th>
                    <th
                        class="px-6 py-4 text-sm font-medium uppercase tracking-wider text-gray-900">
                        Guest
                    </th>
                    <th
                        class="px-6 py-4 text-sm font-medium uppercase tracking-wider text-gray-900">
                        Staff
                    </th>
                    <th
                        class="px-6 py-4 text-sm font-medium uppercase tracking-wider text-gray-900">
                        Amount
                    </th>
                    <th
                        class="px-6 py-4 text-sm font-medium uppercase tracking-wider text-gray-900">
                        Payment Date
                    </th>
                    <th
                        class="px-6 py-4 text-sm font-medium uppercase tracking-wider text-gray-900">
                        Payment Method
                    </th>
                    <th
                        class="px-6 py-4 text-sm font-medium uppercase tracking-wider text-gray-900">
                        Payment Status
                    </th>
                    <th
                        class="px-6 py-4 text-sm font-medium uppercase tracking-wider text-gray-900">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                        {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $payment->reservationService->id_reservation }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $payment->reservationService->reservation->guest->first_name }}
                            {{ $payment->reservationService->reservation->guest->last_name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $payment->staff->first_name }}
                            {{ $payment->staff->last_name }}
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $payment->amount }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $payment->payment_date }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $payment->payment_method }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $payment->payment_status }}
                        </td>
                        <td class="flex gap-2 px-6 py-4">
                            <a
                                href="{{ route('payment.show', $payment->id_payment) }}"
                                class="text-blue-600 hover:text-blue-900">
                                View
                            </a>

                            <a
                                href="{{ route('payment.edit', $payment->id_payment) }}"
                                class="text-green-600 hover:text-green-900">
                                Edit
                            </a>
                            <form
                                action="{{ route('payment.destroy', $payment->id_payment) }}"
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

