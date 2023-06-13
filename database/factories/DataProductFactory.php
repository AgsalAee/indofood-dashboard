<?php

namespace Database\Factories;

use App\Models\DataProduct;
use App\Models\MaterialType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataProduct>
 */
class DataProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $materialtype = MaterialType::inRandomOrder()->distinct()->first();
        return [
            'product_id' => $materialtype->product_mat_id,
            'product_name' =>  fake()->sentence(2),
            'product_total' => fake()->numberBetween(1000, 3500),
            'product_mix_weight' => fake()->randomFloat(2, 0.01, 16),
            'product_addition_weight' => fake()->randomFloat(2, 0.01, 2),
            'product_si_weight' => fake()->randomFloat(2, 0.01, 2),
            'product_etiquete_weight' => fake()->randomFloat(2, 0.01, 1),
            'product_RPM' => fake()->numberBetween(1000, 3500),
            'product_pitch' => fake()->numberBetween(50, 90),
        ];
    }
}
