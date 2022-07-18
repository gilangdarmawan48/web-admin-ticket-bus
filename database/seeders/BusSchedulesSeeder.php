<?php

namespace Database\Seeders;

use App\Models\BusSchedules;
use Illuminate\Database\Seeder;

class BusSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusSchedules::create([
            'companies_id' => '1',
            'list_of_buses_id' => '1', 
            'tanggal' => '20-10-2022',
            'asal' => 'Malang', 
            'tujuan' => 'Surabaya', 
            'tarif' => '20000',
        ]);

        BusSchedules::create([
            'companies_id' => '1',
            'list_of_buses_id' => '2', 
            'tanggal' => '20-10-2022',
            'asal' => 'Malang', 
            'tujuan' => 'Surabaya', 
            'tarif' => '20000',
        ]);

        BusSchedules::create([
            'companies_id' => '1',
            'list_of_buses_id' => '2', 
            'tanggal' => '20-10-2022',
            'asal' => 'Surabaya', 
            'tujuan' => 'Mojokerto', 
            'tarif' => '20000',
        ]);

        BusSchedules::create([
            'companies_id' => '1',
            'list_of_buses_id' => '3', 
            'tanggal' => '20-10-2022',
            'asal' => 'Malang', 
            'tujuan' => 'Surabaya', 
            'tarif' => '20000',
        ]);

        BusSchedules::create([
            'companies_id' => '1',
            'list_of_buses_id' => '3', 
            'tanggal' => '20-10-2022',
            'asal' => 'Surabaya', 
            'tujuan' => 'Ngawi', 
            'tarif' => '50000',
        ]);

        BusSchedules::create([
            'companies_id' => '1',
            'list_of_buses_id' => '4', 
            'tanggal' => '20-10-2022',
            'asal' => 'Malang', 
            'tujuan' => 'Surabaya', 
            'tarif' => '20000',
        ]);

        BusSchedules::create([
            'companies_id' => '1',
            'list_of_buses_id' => '5', 
            'tanggal' => '20-10-2022',
            'asal' => 'Malang', 
            'tujuan' => 'Surabaya', 
            'tarif' => '20000',
        ]);


        BusSchedules::create([
            'companies_id' => '1',
            'list_of_buses_id' => '5', 
            'tanggal' => '20-10-2022',
            'asal' => 'Surabaya', 
            'tujuan' => 'Bali', 
            'tarif' => '400000',
        ]);
    }
}
