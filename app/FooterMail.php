<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterMail extends Model
{
    protected $table = 'mail';
    protected $fillable = ['id','mail'];
}
