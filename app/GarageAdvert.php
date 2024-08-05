<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarageAdvert extends Model
{
    protected $table = "garage_advert";
    protected  $fillable = [
      "c_name" ,
        "description",
        "compan_mail",
        "pic",
        "deal_item"
    ];
    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}
