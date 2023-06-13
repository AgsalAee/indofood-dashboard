<?php

namespace Database\Seeders;

use App\Models\DataProduct;
use App\Models\MaterialType;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataProduct::factory(10)->create();
        // DataProduct::factory(50)->create()->each(function ($dataproduct) {
        //     $dataproduct->MaterialType()->make();
        // });
    }
}
