<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketTemplate>
 */
class TicketTemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->jobTitle(),
            'bandwidth' => fake()->numberBetween(1, 100),
            'data_limit' => fake()->randomFloat(2, 1, 999),
            'duration' => fake()->numberBetween(1, 9),
            'duration_unit' => fake()->randomKey(config('services.duration_units')),
            'sites_blacklist' => fake()->domainName(),
            'sites_whitelist' => fake()->domainName(),
        ];
    }
}
