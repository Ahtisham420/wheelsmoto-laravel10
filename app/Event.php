<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'events';
    protected $fillable = [
        'id',
        'user_id',
        'event_name',
        'location',
        'started_date',
        'end_date',
        'event_description',
        'event_host',

    ];
}
