<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    // types of notifications
    public const exeed_job_time_limit = 0;
    public const withdraw = 1;

    // viewed or not
    public const viewed = 1;
    public const not_viewed = 0;

    protected $fillable = [
        'id',
        'title',
        'type',
        'data',
        'viewed'
    ];
}
