<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DashboardUser extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pivot'
    ];

    protected $table = 'users';

    public function roles() {
        return $this->belongsToMany(Role::class,'users_roles', 'user_id');
    }
}
