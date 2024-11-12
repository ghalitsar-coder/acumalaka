<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Staff;
use Illuminate\Database\Seeder;
class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation = Reservation::first(); // Assuming reservation already exists
        $staff = Staff::first(); // Assuming staff already exists

        Payment::create([
            'id_reservation' => $reservation->id_reservation,
            'id_staff' => $staff->id_staff,
            'amount' => $reservation->total_price,
            'payment_date' => '2023-12-01',
            'payment_method' => 'Credit Card',
        ]);

        // Add more payment entries as needed
    }
}