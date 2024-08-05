<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Misecellinous extends Model
{
    protected $table = "misecellinous";
    protected $fillable = [
        "id",
        "user_id",
        "brand",
        "car_part",
        "price",
        "pics",
        "feature_img",
    ];
    public function brand_misc()
    {
        return $this->belongsTo("App\Brand","brand","id");
    }
      public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public  function model_misc(){
        return $this->belongsTo("App\CarSetting","model","id");
    }
}
