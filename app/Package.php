<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public const per_day = 1;
    public const per_month = 2;
    public const per_year = 3;
    protected $table = "packages";

    protected $fillable = [
        'id',
        'name',
        'tagline',
        'price',
        'duration',
        'off_percentage',
        'off_bit',
        'attributes'
    ];


    public function userpackages()
    {
        return $this->hasMany('App\UserPackage', 'package_id', 'id');
    }
}
