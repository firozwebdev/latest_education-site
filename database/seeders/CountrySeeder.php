<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            ['name' => 'United Kingdom', 'code' => 'GBR', 'image' => null, 'currency' => 'GBP', 'currency_symbol' => '£'],
            ['name' => 'United States', 'code' => 'USA', 'image' => null, 'currency' => 'USD', 'currency_symbol' => '$'],
            ['name' => 'Canada', 'code' => 'CAN', 'image' => null, 'currency' => 'CAD', 'currency_symbol' => 'C$'],
            ['name' => 'Australia', 'code' => 'AUS', 'image' => null, 'currency' => 'AUD', 'currency_symbol' => 'A$'],
            ['name' => 'Malaysia', 'code' => 'MYS', 'image' => null, 'currency' => 'MYR', 'currency_symbol' => 'RM'],
            ['name' => 'Denmark', 'code' => 'DNK', 'image' => null, 'currency' => 'DKK', 'currency_symbol' => 'kr'],
            ['name' => 'Netherlands', 'code' => 'NLD', 'image' => null, 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'France', 'code' => 'FRA', 'image' => null, 'currency' => 'EUR', 'currency_symbol' => '€'],
            ['name' => 'United Arab Emirates', 'code' => 'ARE', 'image' => null, 'currency' => 'AED', 'currency_symbol' => 'د.إ'],
        ];

        foreach ($countries as $country) {
            \App\Models\Country::updateOrCreate(
                ['code' => $country['code']], // find by code
                $country // update or create with all data
            );
        }
    }
}
