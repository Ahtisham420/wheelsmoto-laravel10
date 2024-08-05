<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = "chats";
    protected $fillable = [
        'id',
        'to',
        'from',
        'message',
        'msg_time'
    ];

    public function to_user()
    {
        return $this->hasOne('App\User', 'id', 'to');
    }

    public function from_user()
    {
        return $this->hasOne('App\User', 'id', 'from');
    }
}
