<?php

namespace Database\Seeders;
use App\Models\Guest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guest::create([
            'first_name' => 'megan',
            'last_name' => 'Doe',
            'email' => 'megan.doe@example.com',
            'phone' => '1234567890',
            'address' => '123 Main St, Springfield, USA',
        ]);

        Guest::create([
            'first_name' => 'weekly',
            'last_name' => 'Smith',
            'email' => 'weekly.smith@example.com',
            'phone' => '0987654321',
            'address' => '456 Oak St, Springfield, USA',
        ]);

        // Add more guest entries as needed
    }
}