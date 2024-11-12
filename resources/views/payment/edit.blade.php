@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Edit payment</h1>
            <a
                href="{{ route('payment.index') }}"
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
            action="{{ route('payment.update', $payment->id_payment) }}"
            method="POST"
            class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="id_reservation" class="block text-sm font-medium">Select Reservation</label>
                <select name="id_reservation" id="id_reservation" class="mt-1 block w-full rounded-md border-gray-300">
                    @foreach ($reservations as $reservation)
                        <option value="{{ $reservation->id_reservation }}"
                            {{ $payment->id_reservation == $reservation->id_reservation ? 'selected' : '' }}>
                            Reservation #{{ $reservation->id_reservation }} - {{ $reservation->guest->first_name ?? 'N/A' }}
                            (${{ $reservation->total_price }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Staff Select -->
            <div class="mb-4">
                <label for="id_staff" class="block text-sm font-medium">Select Staff</label>
                <select name="id_staff" id="id_staff" class="mt-1 block w-full rounded-md border-gray-300">
                    @foreach ($staff as $s)
                        <option value="{{ $s->id_staff }}"
                            {{ $payment->id_staff == $s->id_staff ? 'selected' : '' }}>
                            {{ $s->first_name }} - {{ $s->position }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="payment_date" class="block text-sm font-medium">Payment Date</label>
                <input type="date"
                    name="payment_date"
                    id="payment_date"
                    value="{{ $payment->payment_date }}"
                    class="mt-1 block w-full rounded-md border border-gray-300">
                @error('payment_date')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Other payment fields -->
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium">Amount</label>
                <input type="number" name="amount" id="amount"
                    value="{{ $payment->amount }}"
                    class="mt-1 block w-full rounded-md border-gray-300">
            </div>

            <div class="mb-4">
                <label for="payment_method" class="block text-sm font-medium">Payment Method</label>
                <select name="payment_method" id="payment_method" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="cash" {{ $payment->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="credit_card" {{ $payment->payment_method == 'credit_card' ? 'selected' : '' }}>Credit
                        Card</option>
                    <option value="debit_card" {{ $payment->payment_method == 'debit_card' ? 'selected' : '' }}>Debit Card
                    </option>
                </select>
            </div>

            <div class="mb-4">
                <label for="payment_status" class="block text-sm font-medium">Payment Status</label>
                <select name="payment_status" id="payment_status" class="mt-1 block w-full rounded-md border-gray-300">
                    <option value="pending" {{ $payment->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $payment->payment_status == 'completed' ? 'selected' : '' }}>Completed
                    </option>
                    <option value="failed" {{ $payment->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
                    type="submit">
                    Update Payment
                </button>
            </div>
        </form>
    </div>
@endsection

