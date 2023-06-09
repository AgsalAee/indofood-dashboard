<?php

namespace Database\Seeders;

use App\Models\MachineGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            DashboardTableSeeder::class,
            UserAdminSeeder::class,
            DataProductSeeder::class,
            PackingReportSeeder::class,
            MachineGroupSeeder::class,
            PackagingPOSeeder::class,
        ]);
    }
}
