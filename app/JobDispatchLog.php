<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDispatchLog extends Model
{
    //
    public const job_dispatched_init = 0;
    public const job_dispatched_accept = 1;
    public const job_dispatched_dismiss = 2;

    protected $table = "job_dispatch_logs";
    protected $fillable=[
        'job_id',
        'provider_id',
        'customer_id',
        'provider_fcm_token',
        'customer_fcm_token',
        'job_accept_status',
    ];
}
