@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="mb-8 text-center text-3xl font-bold">
            Reservation Service List
        </h1>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-100">
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        #
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Reservation ID
                    </th>
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Service
                    </th>
                   
                    <th
                        class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider text-gray-900">
                        Total Price
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservationServices as $reservationService)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $loop->iteration }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $reservationService->reservation->id_reservation }}
                        </td>
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $reservationService->service->service_type }}
                        </td>
                      
                        <td
                            class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            ${{ $reservationService->total_price }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

