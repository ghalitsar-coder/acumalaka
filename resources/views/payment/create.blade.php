@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Add New payment</h1>
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
            action="{{ route('payment.store') }}"
            method="POST"
            class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
            @csrf
            <!-- Reservation Select -->
            <div class="mb-4">
                <label for="id_reservation_service" class="block text-sm font-medium">Select Reservation Service</label>
                <select name="id_reservation_service" id="id_reservation_service"
                    class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    <option value="">Select a Reservation Service</option>
                    @foreach ($reservations as $reservationService)
                        <option value="{{ $reservationService->id_reservation_service }}"
                            {{ old('id_reservation_service') == $reservationService->id_reservation_service ? 'selected' : '' }}>
                            Reservation #{{ $reservationService->reservation->id_reservation }} -
                            {{ optional($reservationService->reservation->guest)->first_name ?? 'N/A' }} -
                            Service: {{ $reservationService->service->service_type }}
                            (${{ $reservationService->total_price }})
                        </option>
                    @endforeach
                </select>
                @error('id_reservation_service')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Staff Select -->
            <div class="mb-4">
                <label for="id_staff" class="block text-sm font-medium">Select Staff</label>
                <select name="id_staff" id="id_staff" class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    <option value="">Select a Staff Member</option>
                    @foreach ($staff as $s)
                        <option value="{{ $s->id_staff }}"
                            {{ old('id_staff') == $s->id_staff ? 'selected' : '' }}>
                            {{ $s->first_name }} - {{ $s->position }}
                        </option>
                    @endforeach
                </select>
                @error('id_staff')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Other payment fields -->

            <div class="mb-4">
                <label for="payment_date" class="block text-sm font-medium">Payment Date</label>
                <input type="date"
                    name="payment_date"
                    id="payment_date"
                    value="{{ old('payment_date', date('Y-m-d')) }}"
                    class="mt-1 block w-full rounded-md border border-gray-300">
                @error('payment_date')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="payment_method" class="block text-sm font-medium">Payment Method</label>
                <select name="payment_method" id="payment_method"
                    class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    <option value="">Select Payment Method</option>
                    <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="credit_card" {{ old('payment_method') == 'credit_card' ? 'selected' : '' }}>Credit Card
                    </option>
                    <option value="debit_card" {{ old('payment_method') == 'debit_card' ? 'selected' : '' }}>Debit Card
                    </option>
                </select>
                @error('payment_method')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="payment_status" class="block text-sm font-medium">Payment Status</label>
                <select name="payment_status" id="payment_status"
                    class="mt-1 block w-full rounded-md border border-gray-300 py-1.5">
                    <option value="">Select Payment Status</option>
                    <option value="pending" {{ old('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ old('payment_status') == 'completed' ? 'selected' : '' }}>Completed
                    </option>
                    <option value="failed" {{ old('payment_status') == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
                @error('payment_status')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none"
                    type="submit">
                    Create payment
                </button>
            </div>
        </form>
    </div>
@endsection

