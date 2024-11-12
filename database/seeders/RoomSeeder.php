<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run()
    {
        Room::create([
            'room_number' => '101',
            'room_type' => 'Single',
            'capacity' => 1,
            'price_per_night' => 100.00,
            'status' => 'available',
        ]);

        Room::create([
            'room_number' => '102',
            'room_type' => 'Double',
            'capacity' => 2,
            'price_per_night' => 150.00,
            'status' => 'occupied',
        ]);
    }
}
