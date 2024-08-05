<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    protected $fillable = ['user_id','package_id'];
    protected $table='users_packages';


        public function package()
        {
            return $this->belongsTo('App\Package', 'package_id', 'id');
        }

}
