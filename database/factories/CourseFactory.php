<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'logo' => '/storage/courses/default.png',
            'images' => '/storage/courses/default1.png',
            'university_id' => \App\Models\University::factory(),
            'offer_card_1' => $this->faker->sentence(),
            'offer_card_2' => $this->faker->sentence(),
            'city' => $this->faker->city(),
            'qs_ranking' => (string)$this->faker->numberBetween(1, 1000),
            'course_name' => $this->faker->words(3, true),
            'progress_to' => $this->faker->sentence(),
            'student_level' => $this->faker->randomElement(['Undergraduate', 'Graduate', 'PhD']),
            'next_intake' => $this->faker->date(),
            'entry_score' => (string)$this->faker->numberBetween(50, 100),
            'tuition_fees' => (string)$this->faker->numberBetween(10000, 50000),
            'instructor_id' => \App\Models\User::factory(),
            'slug' => $this->faker->unique()->slug(),
            'current_price' => $this->faker->randomFloat(2, 20, 200),
            'off_price' => $this->faker->randomFloat(2, 201, 500),
            'enrolled' => $this->faker->numberBetween(0, 1000),
            'lectures' => $this->faker->numberBetween(1, 100),
            'rating' => $this->faker->randomFloat(2, 3, 5),
            'language' => $this->faker->randomElement(['English','Spanish','French']),
            'certificate' => $this->faker->boolean(80),
            'pass_percentage' => $this->faker->numberBetween(50, 100),
            'preview_video_url' => 'https://www.youtube.com/watch?v=' . $this->faker->lexify('???????????'),
            'description' => $this->faker->paragraphs(3, true),
            'syllabus' => json_encode([
                ['title' => 'Introduction', 'duration' => '30 min'],
                ['title' => 'Fundamentals', 'duration' => '2 hr'],
                ['title' => 'Advanced Topics', 'duration' => '3 hr'],
            ]),
        ];
    }
}
