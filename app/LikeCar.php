<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeCar extends Model
{
    //
    protected $table = 'carlike';
    protected $fillable = ['id','car_id','user_id','type'];
}
