<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'PO Harianto',
            'email' => 'harianto@test.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
