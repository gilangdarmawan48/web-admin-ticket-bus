<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
    use HasFactory;
    protected $guard = 'company';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    // public function bookingbuses(){
    //     return $this->hasMany(BookingBus::class);
    // }

    // public function listofbus(){
    //     return $this->hasMany(ListOfBus::class);
    // }


}
