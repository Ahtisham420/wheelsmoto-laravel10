<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /*
    * constants for status of users
    */

    public const active = 0;
    public const inactive = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'title', // one lane 2 lane 3 lane
        'status',
        'price',
        'commision',
        ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
