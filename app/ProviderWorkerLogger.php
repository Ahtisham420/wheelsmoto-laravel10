<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderWorkerLogger extends Model
{
    //
    protected $table = "provider_working_logs";
    protected $fillable = [
        'id',
        'provider_id',
        'login_time',
        'logout_time',
    ];
}
