<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Role extends Model
{

    use Sluggable;
    // use SoftDeletes;
    protected $table = "roles";
    protected $fillable = ['name','slug'];

    public function permissions() {
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }

    public function getPermissionsIds(){
        return $this->permissions()->pluck('permission_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
