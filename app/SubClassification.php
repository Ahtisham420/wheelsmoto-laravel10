<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubClassification extends Model
{
    //

    public const active = 1;
    public const inactive = 0;

    protected $table = "sub_classifications";

    protected $fillable = [
        'id',
        'name',
        'status',
        'black_feature_icon',
        'white_feature_icon',
        'classification_id',
        'top',
    ];

    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id');
    }
    public function category()
    {
        return $this->hasMany(category::class, 'sub_classification_id');
    }
  
    public static function scopeSearch($query, $string,$columns = [])
    {
        $query->where(function($q) use ($string,$columns) {
            foreach ($columns as $field) {
                $q->orWhere($field, 'LIKE',  '%'.$string.'%');
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }
}
