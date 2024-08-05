<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ContactUs extends Model
{
   use SoftDeletes;
   
    const  paginate = 10;
    protected $table = 'contact_us';
    protected $fillable = ['id','name','email','message'];
}
