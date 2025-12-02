<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Assessment;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assessment::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+1234567890',
            'country' => 'United States',
            'assessment_date' => '2025-11-01',
            'assessment_time' => '10:00:00',
            'message' => 'Looking forward to the assessment.',
        ]);

        Assessment::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@example.com',
            'phone' => '+1987654321',
            'country' => 'Canada',
            'assessment_date' => '2025-11-02',
            'assessment_time' => '14:30:00',
            'message' => 'Please prepare for IELTS assessment.',
        ]);
    }
}
