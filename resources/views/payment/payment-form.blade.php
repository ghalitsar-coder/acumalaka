@extends('layouts.hotel')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="rounded-lg bg-white p-6 shadow">
            @if (session('success'))
                <div class="mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-6">
                <h2 class="mb-4 text-2xl font-bold">Payment Details</h2>

                <div class="mb-6 rounded-lg bg-gray-50 p-4">
                    <h3 class="mb-2 font-semibold">Reservation Summary</h3>
                    <p>Check-in: {{ $reservation->check_in_date->format('M d, Y') }}</p>
                    <p>Check-out: {{ $reservation->check_out_date->format('M d, Y') }}</p>
                    <p>Room: {{ $reservation->room->room_number }} ({{ $reservation->room->room_type }})</p>
                    <p>Service: {{ $reservation->service->service_type }}</p>
                    <p class="mt-2 font-bold">Total Amount: ${{ number_format($reservation->total_price, 2) }}</p>
                </div>
            </div>

            <form action="{{ route('user-payments.store', $reservation) }}" method="POST">
                @csrf

                <input type="hidden" name="amount" value="{{ $reservation->total_price }}">

                <div class="mb-4">
                    <label for="payment_method" class="mb-2 block text-sm font-medium text-gray-700">
                        Payment Method
                    </label>
                    <select
                        name="payment_method"
                        id="payment_method"
                        class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                        <option value="">Select payment method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="bank_transfer">Bank Transfer</option>
                        <option value="cash">Cash</option>
                    </select>
                </div>

                <div class="credit-card-details hidden">
                    <!-- Add credit card form fields here if needed -->
                </div>

                <button type="submit" class="w-full rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                    Pay ${{ number_format($reservation->total_price, 2) }}
                </button>
            </form>
        </div>
    </div>
@endsection
