<?php

namespace Database\Seeders;

use App\Models\BookingBus;
use Illuminate\Database\Seeder;

class BookingBusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            BookingBus::create([
                // 'companies_id' => '1',
                'bus_schedule_id' => '1', 
                'nama_orang_tua' => 'Joko', 
                'umur_orang_tua' => '30', 
                'jenis_kelamin_orang_tua' => 'Laki - Laki',
                'nama_anak' => 'Dimas', 
                'umur_anak' => '7', 
                'jenis_kelamin_anak' => 'Laki - Laki',
                'email' => 'joko@test.com',
                'nomor_telepon' => '081213131313',
            ]);
        }

        for($i = 1; $i <= 5; $i++){
            BookingBus::create([
                // 'companies_id' => '1',
                'bus_schedule_id' => '2', 
                'nama_orang_tua' => 'Joko', 
                'umur_orang_tua' => '30', 
                'jenis_kelamin_orang_tua' => 'Laki - Laki',
                'nama_anak' => 'Dimas', 
                'umur_anak' => '7', 
                'jenis_kelamin_anak' => 'Laki - Laki',
                'email' => 'joko@test.com',
                'nomor_telepon' => '081213131313',
            ]);
        }

        for($i = 1; $i <= 5; $i++){
            BookingBus::create([
                // 'companies_id' => '1',
                'bus_schedule_id' => '3', 
                'nama_orang_tua' => 'Joko', 
                'umur_orang_tua' => '30', 
                'jenis_kelamin_orang_tua' => 'Laki - Laki',
                'nama_anak' => 'Dimas', 
                'umur_anak' => '7', 
                'jenis_kelamin_anak' => 'Laki - Laki',
                'email' => 'joko@test.com',
                'nomor_telepon' => '081213131313',
            ]);
        }

        for($i = 1; $i <= 5; $i++){
            BookingBus::create([
                // 'companies_id' => '1',
                'bus_schedule_id' => '4', 
                'nama_orang_tua' => 'Joko', 
                'umur_orang_tua' => '30', 
                'jenis_kelamin_orang_tua' => 'Laki - Laki',
                'nama_anak' => 'Dimas', 
                'umur_anak' => '7', 
                'jenis_kelamin_anak' => 'Laki - Laki',
                'email' => 'joko@test.com',
                'nomor_telepon' => '081213131313',
            ]);
        }
    }
}
