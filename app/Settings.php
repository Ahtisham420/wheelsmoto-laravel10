<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = "settings";
    public $timestamps = false;

    protected $fillable = [

        'id',
        'google_maps',
        'google_places',
        'logo',
        'fevicon',
        'meta_description',
        'id'

    ];
}
