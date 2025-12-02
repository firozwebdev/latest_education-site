<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currencies = [
            'USD' => '$',
            'GBP' => '£',
            'EUR' => '€',
            'JPY' => '¥',
            'AUD' => 'A$',
            'CAD' => 'C$',
            'CHF' => 'Fr',
            'CNY' => '¥',
            'INR' => '₹',
            'NZD' => 'NZ$'
        ];
        $currency = $this->faker->randomElement(array_keys($currencies));
        
        return [
            'name' => $this->faker->country(),
            'code' => strtoupper($this->faker->unique()->lexify('???')),
            'currency' => $currency,
            'currency_symbol' => $currencies[$currency],
        ];
    }
}
