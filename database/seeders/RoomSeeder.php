<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'room_number' => '101',
                'room_type' => 'single',
                'capacity' => 1,
                'price_per_night' => 100.00,
                'status' => 'available',
                'image' => 'https://via.placeholder.com/300?text=Single+Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '102',
                'room_type' => 'double',
                'capacity' => 2,
                'price_per_night' => 150.00,
                'status' => 'available',
                'image' => 'https://via.placeholder.com/300?text=Double+Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '103',
                'room_type' => 'queen',
                'capacity' => 3,
                'price_per_night' => 200.00,
                'status' => 'available',
                'image' => 'https://via.placeholder.com/300?text=Queen+Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'room_number' => '104',
                'room_type' => 'king',
                'capacity' => 4,
                'price_per_night' => 250.00,
                'status' => 'available',
                'image' => 'https://via.placeholder.com/300?text=King+Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
