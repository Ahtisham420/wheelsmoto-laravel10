<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swap extends Model
{
    protected $table  = "swaps";
    protected $fillable = [
        'id',
        'user_id',
        'registration_number',
        'mileage',
        'manufacture',
        'car_type',
        'car_make',
        'engine_type',
        'model',
        'color',
        'car_condition',
        'pic',
        'featured_img'
    ];

}
