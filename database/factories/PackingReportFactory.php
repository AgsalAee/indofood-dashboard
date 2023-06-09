<?php

namespace Database\Factories;

use App\Models\DataProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackingReport>
 */
class PackingReportFactory extends Factory
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
            'product_id' => $product->product_id,
            'name_product' => $product->product_name,
            'total_product' => $product->product_total,
            'packing_boxShA' => fake()->numberBetween(10, 200),
            'packing_boxShB' => fake()->numberBetween(10, 200),
        ];
    }
}
