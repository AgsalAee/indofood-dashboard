<?php

namespace Database\Factories;

use App\Models\DataProduct;
use App\Models\MachineNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScheduleProduction>
 */
class ScheduleProductionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'product_id',
            'name_product',
            'RPM_product',
            'pitch_product',
            'shift',
            'production_hours',
            'machines_in_operation',
            'machine_number',
            'tp_number',
        ];
    }
}
