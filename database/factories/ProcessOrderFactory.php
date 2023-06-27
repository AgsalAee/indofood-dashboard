<?php

namespace Database\Factories;

use App\Models\DataProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProcessOrder>
 */
class ProcessOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = DataProduct::inRandomOrder()->distinct()->first();
        return [
            'po_id' => fake()->unique()->numberBetween(1, 150),
            'finish_date' => fake()->date("Y-m-d", "now"),
            'shift' => fake()->sentence(1),
            'number_material' => $product->product_id,
            'quantity' => fake()->numberBetween(0, 999999999),
        ];
    }
}
