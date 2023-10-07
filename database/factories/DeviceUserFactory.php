<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeviceUser>
 */
class DeviceUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dataLimit = fake()->numberBetween(1, 1024);

        return [
            'username' => fake()->userName(),
            'password' => fake()->password(),
            'name' => fake()->name(),
            'connected' => fake()->boolean(),
            'data_limit_reached' => fake()->boolean(),
            'data_used' => fake()->randomFloat(2, 1, $dataLimit),
        ];
    }
}
