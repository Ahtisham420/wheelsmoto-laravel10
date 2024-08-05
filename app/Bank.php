<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = "banks";

    protected $fillable = [
        'id',
        'user_id',
        'bank_name',
        'swift_code',
        'IBAN',
        'account_no',
        'country'
    ];
}
