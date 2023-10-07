<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Router>
 */
class RouterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $model = Str::upper(fake()->bothify('???-###'));

        return [
            'name' => "{$model} - " . fake()->streetName() . ', ' . fake()->city(),
            'model' => $model,
            'host' => fake()->domainName(),
            'username' => fake()->username(),
            'password' => fake()->password(6, 8),
        ];
    }
}
