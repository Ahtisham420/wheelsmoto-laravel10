<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarSetting extends Model
{
    protected $table = "car_settings";

    protected  $fillable =
        [
            "_key",
            "_value",
            "status",
            "created_at",
            "updated_at",
        ];
		public function engine_type()
    {
        return $this->hasMany(CarSetting::class,"engine_type");
    }
	public function color()
    {
        return $this->hasMany(CarSetting::class,"color");
    }
	public function parking_sensor()
    {
        return $this->hasMany(CarSetting::class,"parking_sensor");
    }
	public function exhaust()
    {
        return $this->hasMany(CarSetting::class,"exhaust");
    }
	public function car_type()
    {
        return $this->hasMany(CarSetting::class,"car_type");
    }
	public function body_type()
    {
        return $this->hasMany(CarSetting::class,"body_type");
    }

    public function model(){
		    return $this->hasMany(CarSetting::class,"model","id");
		    }
    public function varient(){
        return $this->hasMany(CarSetting::class,"varient","id");
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
