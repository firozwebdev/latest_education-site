<?php

namespace Database\Seeders;

use App\Models\SuccessDelivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuccessDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuccessDelivery::factory(10)->create();
    }
}
