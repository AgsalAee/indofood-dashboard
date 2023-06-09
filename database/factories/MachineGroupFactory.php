<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MachineGroup>
 */
class MachineGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'group_id' => fake()->unique()->numberBetween(1, 100),
            'machine_group_line' => fake()->sentence(2),
            'machine_group_type' => fake()->sentence(2),
        ];
    }
}
