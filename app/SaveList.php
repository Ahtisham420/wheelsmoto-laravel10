<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveList extends Model
{
    protected  $table = "save_wanted";
    protected $fillable = [
      "id",
      "user_id",
      "car_id",
    ];
    public  function  wantedCar(){
        return $this->belongsTo('App\Wanted','car_id','id');
    }
}
