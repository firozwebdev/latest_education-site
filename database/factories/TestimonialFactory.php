<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'review' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(),
            'degree_name' => $this->faker->randomElement(['BSc', 'MSc', 'PhD', 'MBA']),
            'university_id' => \App\Models\University::factory(),
        ];
    }
}
