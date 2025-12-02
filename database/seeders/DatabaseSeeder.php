<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed countries from the CountrySeeder
        $this->call(CountrySeeder::class);
        
        // Create universities for a selection of countries
        $countries = \App\Models\Country::inRandomOrder()->take(8)->get();
        foreach ($countries as $country) {
            // For each country create 1-3 universities, each with 1-5 courses
            \App\Models\University::factory(rand(1, 3))
                ->for($country)
                ->has(\App\Models\Course::factory()->count(rand(1, 5)))
                ->create();
        }

        // Subjects
        \App\Models\Subject::factory(6)->create();

        // Branches tied to random countries
        \App\Models\Branch::factory(12)->create();

        // Events, Testimonials, Success deliveries
        \App\Models\Event::factory(8)->create();
        \App\Models\Testimonial::factory(12)->create();
        \App\Models\SuccessDelivery::factory(8)->create();

        // Create a test user and some random users
        User::updateOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Test User',
            'password' => bcrypt('password'),
        ]);
        User::factory(5)->create();

        // Seed blogs
        $this->call(BlogSeeder::class);

        // Seed appointments
        $this->call(AppointmentSeeder::class);
        $this->call(AdminSeeder::class);

        // Seed assessments
        $this->call(AssessmentSeeder::class);

        // Seed newsletters
        $this->call(NewsletterSeeder::class);
    }
}
