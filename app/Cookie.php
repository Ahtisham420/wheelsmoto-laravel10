<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cookie extends Model
{
    protected  $table = "cookies";

    public $fillable = [
        'c_name',
        'search',
    ];
    public $hidden=['created_at','updated_at'];
}
