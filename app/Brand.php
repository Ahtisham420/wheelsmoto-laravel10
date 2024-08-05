<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $table = "brands";
    protected $fillable = [
        'id',
        'name',
        'slug',
        'top_list'
    ];
  public  const active = 1;
  public  const inactive = 0;
 public  function garageBrand(){
     return $this->hasMany('App\Wanted','brand','id');
 }

}
