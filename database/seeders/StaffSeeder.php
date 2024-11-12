<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
            'first_name' => 'Alice',
            'last_name' => 'Johnson',
            'position' => 'Manager',
            'email' => 'alice.johnson@example.com',
            'phone' => '1112223333',
            'hire_date' => '2020-01-15',
        ]);

        Staff::create([
            'first_name' => 'Bob',
            'last_name' => 'Williams',
            'position' => 'Receptionist',
            'email' => 'bob.williams@example.com',
            'phone' => '4445556666',
            'hire_date' => '2022-05-20',
        ]);

        // Add more staff entries as needed
    }
}
