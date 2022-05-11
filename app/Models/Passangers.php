<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Passangers extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $attributes = [ 
        'status' => 'Missing',
        'phone_number' =>'max:10'
    ];

    protected $fillable = [
        'pid', 'name', 'fligh_no','email','phone_number','flight_class',
        'flight_origin', 'destination','status',
    ];

    public function flights(){
        return $this->belongsToMany('App\Models\flights');
    }
}
