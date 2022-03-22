<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_no',
        'destination',
        'origin',
        'date',
        'flight_status',
        'no_bags',
    ];


    public function passangers(){
        return $this->hasMany('App\Models\Passangers');
    }
}
