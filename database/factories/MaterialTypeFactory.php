<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaterialType>
 */
class MaterialTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_mat_id' => fake()->unique()->numberBetween($min = 1000, $max = 99999),
            'material_name' => fake()->sentence(1),
            'product_description' => fake()->sentence(4),
            'material_type' => fake()->sentence(2)
        ];
    }
}
