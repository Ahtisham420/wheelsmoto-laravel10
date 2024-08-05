<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    public $casts = [
        'approved' => 'boolean',
    ];

    public $fillable = [

        'comment',
        'author_name',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('approved', function (Builder $builder) {
            $builder->orderBy("id", 'asc');
            $builder->where("approved", true);
        });
    }


    /**
     * The associated BlogEtcPost
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public  function  user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function post()
    {
        return $this->belongsTo(Post::class, "post_id");
    }


    public function author()
    {
        return $this->author_name;
    }
}
