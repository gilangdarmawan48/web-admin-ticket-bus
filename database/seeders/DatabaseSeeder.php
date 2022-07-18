<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\BusSchedules;
use App\Models\Company;
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
        // \App\Models\User::factory(10)->create();
        $this->call(AdminSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(BookingBusesSeeder::class);
        $this->call(BusSchedulesSeeder::class);
        $this->call(ListOfBusesSeeder::class);
    }
}
