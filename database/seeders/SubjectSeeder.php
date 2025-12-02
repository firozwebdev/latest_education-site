<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        Subject::create([
            'name' => 'Mathematics',
            'description' => 'Study of numbers, quantities, and shapes.'
        ]);
        Subject::create([
            'name' => 'Physics',
            'description' => 'Study of matter, energy, and the laws of nature.'
        ]);
        Subject::create([
            'name' => 'Chemistry',
            'description' => 'Study of substances and their interactions.'
        ]);
    }
}
