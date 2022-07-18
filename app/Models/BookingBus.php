<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingBus extends Model
{
    use HasFactory;
    protected $fillable = [
        'companies_id',
        'bus_schedule_id', 
        'nama_orang_tua', 
        'umur_orang_tua', 
        'jenis_kelamin_orang_tua',
        'nama_anak', 
        'umur_anak', 
        'jenis_kelamin_anak',
        'email',
        'nomor_telepon',
    ];

}
