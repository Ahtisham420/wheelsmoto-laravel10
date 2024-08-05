<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System_prefrence extends Model
{
    /*
     * table name
     */
    protected $table = "system_prefrences";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'max_job_limit',
        'max_job_cancellation_time',
        'max_job_acception_time',
        ];
}
