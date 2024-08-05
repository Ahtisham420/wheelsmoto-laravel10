<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    //
    protected $table = "guides";
    protected $fillable=[
        'id',
        'user_id',
	    'user_type',
        'issue_name',
        'issue_type',
        'issue_description',
        'status',
    ];
}
