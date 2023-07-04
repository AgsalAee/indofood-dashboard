<?php

namespace Database\Seeders;

use App\Models\MachineGroup;
use App\Models\ProcessOrder;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Symfony\Component\Process\Process;

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
            // MaterialTypeSeeder::class,
            DataProductSeeder::class,
            PackingReportSeeder::class,
            MachineGroupSeeder::class,
            // PackagingPOSeeder::class,
            MachineNumberSeeder::class,
            ProcessOrderSeeder::class,
            // ScheduleProductionSeeder::class,
        ]);
    }
}
