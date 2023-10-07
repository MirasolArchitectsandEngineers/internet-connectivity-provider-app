<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeviceUserGroup>
 */
class DeviceUserGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $connectedCount = fake()->numberBetween(1, 100);

        $dataLimit = fake()->numberBetween(1, 1024);

        $timeFrom = fake()->time('h:i A');

        $timeTo = Carbon::parse($timeFrom)
            ->addHours(fake()->numberBetween(4, 8))
            ->format('h:i A');

        return [
            'name' => fake()->jobTitle(),
            'connected_count' => $connectedCount,
            'data_limit_reached_count' => fake()->numberBetween(1, $connectedCount),
            'data_used' => fake()->randomFloat(2, 1, $dataLimit),
            'data_limit' => [
                [
                    'value' => fake()->numberBetween(1, 1024),
                    'unit' => null,
                    'options' => null,
                    'from' => null,
                    'to' => null,
                ],
            ],
            'download_speed_limit' => [
                [
                    'value' => fake()->numberBetween(1, 100),
                    'unit' => null,
                    'options' => null,
                    'from' => null,
                    'to' => null,
                ],
            ],
            'upload_speed_limit' => [
                [
                    'value' => fake()->numberBetween(1, 100),
                    'unit' => null,
                    'options' => null,
                    'from' => null,
                    'to' => null,
                ],
            ],
            'disable_access' => [
                [
                    'unit' => 'day',
                    'options' => null,
                    'from' => $timeFrom,
                    'to' => $timeTo,
                ],
            ],
            'sites_allowed' => [fake()->domainName()],
            'sites_denied' => [fake()->domainName()],
        ];
    }
}
