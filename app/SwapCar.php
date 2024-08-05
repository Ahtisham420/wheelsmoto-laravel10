<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SwapCar extends Model
{
    protected $table = "swap_request";
    protected $fillable = [
        'id',
        'user_id',
        'swap_list_id',
        'swap_car_id',
        'status'
    ];
}
