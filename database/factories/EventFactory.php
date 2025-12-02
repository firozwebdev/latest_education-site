<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'logo' => $this->faker->imageUrl(),
            'content' => $this->faker->paragraph(),
            'event_name' => $this->faker->sentence(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'location_name' => $this->faker->address(),
            'details_description' => $this->faker->paragraphs(3, true),
            'single_page_view' => $this->faker->boolean(),
        ];
    }
}
