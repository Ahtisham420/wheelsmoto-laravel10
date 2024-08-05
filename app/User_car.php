<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User_car extends Authenticatable
{
    use Notifiable;
	protected $table="user_cars";

    const pagination = 6;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
static public function Leasecars($type){
   return  User_car::Where('car_availbilty',$type)->get();
}
    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
   public function engine_type()
    {
        return $this->belongsTo(CarSetting::class,"engine_type");
    }
    public function enginetype()
    {
        return $this->belongsTo(CarSetting::class,"engine_type");
    }
	 public function color()
    {
        return $this->belongsTo(CarSetting::class,"color");
    }
	 public function parking_sensor()
    {
        return $this->belongsTo(CarSetting::class,"parking_sensor");
    }
	 public function exhaust()
    {
        return $this->belongsTo(CarSetting::class,"exhaust");
    }
	 public function car_type()
    {
        return $this->belongsTo(CarSetting::class,"car_type");
    }
    public function cartype()
    {
        return $this->belongsTo(CarSetting::class,"car_type");
    }
	 public function body_type()
    {
        return $this->belongsTo(CarSetting::class,"body_type");
    }

    public function modal_m()
    {
        return $this->belongsTo(CarSetting::class,"modal");
    }
    public function modal()
    {
        return $this->belongsTo(CarSetting::class,"modal");
    }

    public function stat_l()
    {
        return $this->belongsTo(CarState::class,"state");
    }
    public function city_l()
    {
        return $this->belongsTo(CarSetting::class,"city");
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,"brand");
    }
     public function brand_d()
    {
        return $this->belongsTo(Brand::class,"brand");
    }
    public function car_make()
    {
        return $this->belongsTo(CarSetting::class,"car_make");
    }
    public function carmake()
    {
        return $this->belongsTo(CarSetting::class,"car_make");
    }

    public static function scopeSearch($query, $string,$columns = [])
    {
        $query->where(function($q) use ($string,$columns) {
            foreach ($columns as $field) {
                $q->orWhere($field, 'LIKE',  '%'.$string.'%');
            }
        });
    }


}
