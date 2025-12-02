<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universityIds = \DB::table('universities')->pluck('id')->toArray();
        foreach ($universityIds as $universityId) {
            Course::factory()->create(['university_id' => $universityId]);
        }
    }
}
