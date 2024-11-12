<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ReservationService;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Database\Seeder;
class ReservationServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation = Reservation::first(); // Assuming reservation already exists
        $service = Service::first(); // Assuming service already exists

        ReservationService::create([
            'id_reservation' => $reservation->id_reservation,
            'id_service' => $service->id_service,
            'quantity' => 2,
            'total_price' => $service->price * 2,
        ]);

        // Add more reservation service entries as needed
    }
}