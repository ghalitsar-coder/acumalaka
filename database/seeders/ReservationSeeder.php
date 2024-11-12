<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Reservation;
use App\Models\Guest;
use App\Models\Room;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guest = Guest::first(); // Assuming guest already exists
        $room = Room::first(); // Assuming room already exists
        $staff = Staff::first(); // Assuming staff already exists

        Reservation::create([
            'id_guest' => $guest->id_guest,
            'id_room' => $room->id_room,
            'id_staff' => $staff->id_staff,
            'check_in_date' => '2023-12-01',
            'check_out_date' => '2023-12-05',
            'total_price' => 100.00,
            'status' => 'confirmed',
        ]);
        Reservation::create([
            'id_guest' => $guest->id_guest,
            'id_room' => $room->id_room,
            'id_staff' => $staff->id_staff,
            'check_in_date' => '2023-12-01',
            'check_out_date' => '2023-12-05',
            'total_price' => 200.00,
            'status' => 'confirmed',
        ]);

        // Add more reservation entries as needed
    }
}