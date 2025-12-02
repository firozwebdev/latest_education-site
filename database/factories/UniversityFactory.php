<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\University>
 */
class UniversityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_id' => \App\Models\Country::factory(),
            'university_name' => $this->faker->company() . ' University',
            'student_level' => $this->faker->randomElement(['Undergraduate', 'Graduate', 'PhD']),
            'duration' => $this->faker->randomElement(['1 year', '2 years', '3 years', '4 years']),
            'next_intake' => $this->faker->randomElement(['January', 'September', 'March']),
            'tuition_fees' => $this->faker->randomFloat(2, 10000, 50000),
            'scholarship' => $this->faker->randomElement(['Available', 'Not Available']),
            'ielts_score' => $this->faker->randomElement(['5.5', '6.0', '6.5', '7.0']),
            'website_url' => $this->faker->url(),
            'description' => $this->faker->paragraph(),
            'global_rank' => $this->faker->numberBetween(1, 1000),
            'in_country_rank' => $this->faker->numberBetween(1, 100),
            'location' => $this->faker->city(),
            'logo' => '/storage/universities/default.png',
            'university_wise_course' => $this->faker->sentence(),
        ];
    }
}
