<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'gilang',
            'email' => 'gilang@test.com',
            'password' => bcrypt('123456'),
        ]);

        Admin::create([
            'name' => 'vijar',
            'email' => 'vijar@test.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
