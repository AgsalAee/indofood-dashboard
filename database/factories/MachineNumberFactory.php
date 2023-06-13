<?php

namespace Database\Factories;

use App\Models\DataProduct;
use App\Models\MachineGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MachineNumber>
 */
class MachineNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $product = DataProduct::inRandomOrder()->distinct()->first();
        $machgroup = MachineGroup::inRandomOrder()->distinct()->first();
        return [
            'machine_id' => fake()->unique()->numberBetween($min = 1, $max = 150),
            'status' => fake()->boolean(70),
            'id_group' => $machgroup->group_id,
            'id_product_code' => $product->product_id,
            'id_downtime' => fake()->numberBetween(30, 360),
        ];
    }
}
