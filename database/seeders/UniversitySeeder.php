<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countryIds = \DB::table('countries')->pluck('id')->toArray();
        foreach ($countryIds as $countryId) {
            \App\Models\University::factory()->create(['country_id' => $countryId]);
        }
    }
}
