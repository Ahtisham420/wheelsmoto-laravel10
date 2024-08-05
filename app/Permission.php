<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Permission extends Model
{
    use Sluggable;

    protected $table = "permissions";
    protected $fillable = ['name','slug','parent_id'];

    public function roles() {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }

    public function parentpermission(){
        return $this->belongsTo('App\Permission','id','parent_id');
    }

    /**
     * A Category has many child categories
     *
     * @return void
     */
    public function childs()
    {
        return $this->hasMany(Permission::class, 'parent_id', 'id');
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
