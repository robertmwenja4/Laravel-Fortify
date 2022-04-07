<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Luggages extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'cardID',
        'bag_weight',
        'pid'
    ];

    public function passangers(){
        return $this->belongsToMany('App\Models\Passangers');
    }

    public function flights(){
        return $this->hasManyThrough(Flights::class, Passangers::class);
    }
}
