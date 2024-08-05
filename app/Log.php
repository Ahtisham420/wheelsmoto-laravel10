<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $hidden = [
        'pivot'
    ];

    /**
     * @var string $table
     */
    protected $table = 'logs';
    /**
     * @var array $guarded
     */
    protected $guarded = ['id'];


    public function user() {

        return $this->belongsTo(DashboardUser::class)->with('roles');

    }
}

