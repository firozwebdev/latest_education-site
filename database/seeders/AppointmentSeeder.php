<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+1234567890',
            'country' => 'United States',
            'appointment_date' => '2025-11-01',
            'appointment_time' => '10:00:00',
            'message' => 'Looking forward to the appointment.',
        ]);

        Appointment::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@example.com',
            'phone' => '+0987654321',
            'country' => 'Canada',
            'appointment_date' => '2025-11-02',
            'appointment_time' => '14:30:00',
            'message' => 'Please confirm the appointment.',
        ]);
    }
}
