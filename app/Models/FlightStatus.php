<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightStatus extends Model
{
    use HasFactory;

    // [
            //     "$request->bag_tagID",
            //     "$request->Terminal_at",
            //     "$getPID->pid",
            //     "$getflightNo->fligh_no"
            // ]

    protected $fillable = [
        'bag_tagID',
        'Terminal_at',
        'pid',
        'flight_no'
    ];

}
