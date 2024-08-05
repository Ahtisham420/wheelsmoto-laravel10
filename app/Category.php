<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Post;
use App\Product;
class Category extends Model
{
    use SoftDeletes;
    use Sluggable;
    protected $table = "categories";
    const digital = 1;
    const physical  = 0;
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'image',
        'slug',
        'interest_img',
        'icon_img',
        'feature_img',
        'classification_id',
        'sub_classification_id',
        'custom_attribute',
        'attribute_classification_detail_type',
        'ammunties',
        'nature_type',
    ];
     /*
     * constants for status of category
     */
    public const active = 1;
    public const inactive = 0;



    protected $hidden = array('pivot');

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_categories');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }


    public function classification()
    {
        return $this->belongsTo(Classification::class, 'classification_id');
    }
    public function sub_classification()
    {
        return $this->belongsTo(SubClassification::class, 'sub_classification_id');
    }


    public function product_undercategory()
    {
        return $this->belongsToMany(Product::class, 'product_categories')->paginate(2);
    }

    public function child_category()
    {
        return $this->hasMany(Category::class)->with('categories_1');
    }

    public function categories_1()
    {
        return $this->hasMany(Category::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeActive($query){
        return $query->where('status','=',1);
    }
    public function scopeTopListOrder($query){
        return $query->orderBy('top_list', 'desc');
    }
    public static function scopeSearch($query, $string,$columns = [])
    {
        $query->where(function($q) use ($string,$columns) {
            foreach ($columns as $field) {
                $q->orWhere($field, 'LIKE',  '%'.$string.'%');
            }
        });
    }
}
