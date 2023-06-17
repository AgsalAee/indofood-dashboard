<?php

namespace Database\Seeders;

use App\Models\DataProduct;
use App\Models\MachineNumber;
use App\Models\ScheduleProduction;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ScheduleProduction::factory(50)->has(MachineNumber::factory(2)->has(DataProduct::factory(3)))->Create();
    }
}
