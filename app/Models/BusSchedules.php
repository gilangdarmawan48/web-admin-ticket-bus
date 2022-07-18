<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSchedules extends Model
{
    use HasFactory;

    protected $fillable = [
        'companies_id',
        'list_of_buses_id',
        'tanggal',
        'asal', 
        'tujuan', 
        'tarif'
    ];
}
