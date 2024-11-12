<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'service_name' => 'Room Cleaning',
            'description' => 'Daily cleaning of rooms.',
            'price' => 20.00,
        ]);

        Service::create([
            'service_name' => 'Spa',
            'description' => 'Relaxing spa treatment.',
            'price' => 50.00,
        ]);

        // Add more service entries as needed
    }
}