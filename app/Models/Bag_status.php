<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bag_status extends Model
{
    use HasFactory;
    protected $fillable = [
        'bag_tagID',
        'Terminal_at'
    ];
}
