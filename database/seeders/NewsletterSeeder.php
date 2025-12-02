<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Newsletter;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Newsletter::create([
            'email' => 'john.doe@example.com',
        ]);

        Newsletter::create([
            'email' => 'jane.smith@example.com',
        ]);

        Newsletter::create([
            'email' => 'test@example.com',
        ]);
    }
}
