<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /*
     * constants for status of users
     */

    public const active = 0;
    public const inactive = 1;
    public const banned = 2;
    public const pending = 3;
    public const unverfied = 4;

    /*
     * constants for type of users
     */

    public const customer = 0;
    public const provider = 1;
    public const vendor = 1;
    public const admin = 2;

    /**
     * Identity type constants
     */

    public const identity_card = 0;
    public const bay_form = 1;
    public const passport = 2;
    public const driving_license = 3;
    public const other_gov_document = 100;

    /**
     * gender constants
     */

    public const female = "Female";
    public const male = "Male";
    public const other = "Others";


    /**
     * user identity verification constants
     */

    public const unverified = 0;
    public const verified = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 public function user()
    {
        return $this->hasMany(CarSetting::class);
    }

    protected $fillable = [
        'id',
        'username',
        'email',
        'email_token',
        'email_verified_at',
        'password',
        'remember_token',
        'phone',
        'avatar',
        'address',
        'fcm_token',
        'socket_token',
        'social_id',
        'lat',
        'lng',
        'status',
        'first_name',
        'last_name',
        'type',
        'time_zone',
        'stripe_unique_id',
        'rating',
        'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function getIdentityType($id_type){
        $result = "";
        if($id_type == User::identity_card){
            $result = trans('admin/pages/users_list.identity_card');
        }elseif ($id_type == User::bay_form){
            $result = trans('admin/pages/users_list.bay_form');
        }elseif ($id_type == User::passport){
            $result = trans('admin/pages/users_list.passport');
        }elseif ($id_type == User::driving_license){
            $result = trans('admin/pages/users_list.driving_license');
        }elseif ($id_type == User::other_gov_document){
            $result = trans('admin/pages/users_list.other_gov_docs');
        }
        return $result;
    }

    public static function scopeSearch($query, $string,$columns = [])
    {
        $query->where(function($q) use ($string,$columns) {
            foreach ($columns as $field) {
                $q->orWhere($field, 'LIKE',  '%'.$string.'%');
            }
        });
    }
    public function to_user()
    {
        return $this->hasMany('App\WantedChat',"to_id","id");
    }
    public function to_from_user()
    {
        return $this->hasMany("App\WantedChat","from_id","id");
    }
}
