<?php

namespace Database\Seeders;

use App\Models\ListOfBus;
use Illuminate\Database\Seeder;

class ListOfBusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ListOfBus::create([
            'companies_id' => '1',
            'plat_nomor_bus' => 'N 123 PQ', 
            'kelas' => 'Economy', 
            'tempat_duduk_orang_tua' => '25', 
            'tempat_duduk_anak' => '5',
        ]);

        ListOfBus::create([
            'companies_id' => '1',
            'plat_nomor_bus' => 'N 142 ZX', 
            'kelas' => 'Economy', 
            'tempat_duduk_orang_tua' => '30', 
            'tempat_duduk_anak' => '15',
        ]);

        ListOfBus::create([
            'companies_id' => '1',
            'plat_nomor_bus' => 'N 192 MN', 
            'kelas' => 'Economy', 
            'tempat_duduk_orang_tua' => '45', 
            'tempat_duduk_anak' => '10',
        ]);

        ListOfBus::create([
            'companies_id' => '1',
            'plat_nomor_bus' => 'N 882 KL', 
            'kelas' => 'Economy', 
            'tempat_duduk_orang_tua' => '55', 
            'tempat_duduk_anak' => '5',
        ]);

        ListOfBus::create([
            'companies_id' => '1',
            'plat_nomor_bus' => 'N 716 UI', 
            'kelas' => 'Economy', 
            'tempat_duduk_orang_tua' => '30', 
            'tempat_duduk_anak' => '15',
        ]);
    }
}
