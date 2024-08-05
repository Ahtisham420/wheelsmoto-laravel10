<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogLike extends Model
{
   protected $table = "save_blog";
   protected $fillable = [
       'id',
       'user_id',
       'post_id',
       ];
}
