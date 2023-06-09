<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackagingPO>
 */
class PackagingPOFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'process_id' => fake()->unique()->numberBetween(1, 150),
            'finish_date' => fake()->date("Y-m-d", "now"),
            'shift' => fake()->sentence(1),
            'number_material' => fake()->numberBetween(1000, 99999999),
            'quantity' => fake()->numberBetween(0, 999999999),
        ];
    }
}
