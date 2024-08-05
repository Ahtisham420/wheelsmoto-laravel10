<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{

    protected $table = "classification";

    public const product = 1;
    public const service = 2;
    public const property = 3;
    public const vehicle = 4;
    public const become_driver = 5;
    public const ticket = 6;

    public function subclassification()
    {
        return $this->hasMany(SubClassification::class)->where('status', '=', 1);
    }

    public function category()
    {
        return $this->hasMany(category::class, 'classification_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }
}
