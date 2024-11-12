<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BookSeeder::class,
            RoomSeeder::class,
            GuestSeeder::class,
            StaffSeeder::class,
            ServiceSeeder::class,
            ReservationSeeder::class,
            PaymentSeeder::class,
            ReservationServiceSeeder::class,
        ]);
    }
}