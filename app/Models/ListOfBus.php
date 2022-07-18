<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListOfBus extends Model
{
    use HasFactory;
    protected $fillable = [
        'companies_id',
        'plat_nomor_bus', 
        'kelas', 
        'tempat_duduk_orang_tua', 
        'tempat_duduk_anak',
    ];
}
