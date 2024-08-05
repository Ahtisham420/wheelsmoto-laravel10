<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarState extends Model
{
    protected $table="state";
    protected  $fillable =['id','name'];
}
