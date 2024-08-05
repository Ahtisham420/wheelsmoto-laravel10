<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wanted extends Model
{



    protected $table = "wanted_section";
   protected $fillable = [
       "id",
       "user_id",
       "title",
       "describe",
       "image",
       "brand",
       "model",
       "varient",
       "vehicle",
       "budget",
       "user_number",
       "mail",
   ];

    public  function  savedCar(){
        return $this->hasMany('App\SaveList','car_id','id');
    }
   public  function  brandWanted(){
       return $this->belongsTo('App\Brand','brand','id');
   }
    public  function  modelWanted(){
        return $this->belongsTo(CarSetting::class,'model','id');
    }
    public  function varientWanted(){
        return $this->belongsTo(CarSetting::class,'varient','id');
    }
    public  function same_car(){
        return $this->hasMany('App\WantedChat','car_id','id');
    }
}
