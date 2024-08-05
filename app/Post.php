<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\User;
use App\Comment;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use SoftDeletes;

  //  use Sluggable;
    protected $slug = 0;
    protected $id = 0;

    protected $table = "posts";
    protected $fillable = [
        'title',
        'subtitle',
        'short_description',
        'post_body',
        'seo_title',
        'meta_desc',
        'slug',
        'post_tags',
        'is_published',
        'posted_at',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

//    public function author_name($id){
//        return User::find($id)->username;
//    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function generate_introduction($max_len = 500)
    {
        $base_text_to_use = $this->short_description;
        if (!trim($base_text_to_use)) {
            $base_text_to_use = $this->post_body;
        }
        $base_text_to_use = strip_tags($base_text_to_use);

        $intro = str_limit($base_text_to_use, (int) $max_len);
        return nl2br(e($intro));
    }

    /**
     * Returns the public facing URL to view this blog post
     *
     * @return string
     */
    public function url()
    {
        return route("blog-page.singles", $this->slug);
    }


    /**
     * Comments for this post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function image_tag($auto_link = true, $img_class = null, $anchor_class = null)
    {

        $url = e($this->image_url($this->image_large));
        $alt = e($this->title);
        $img = "<img src='$url' alt='$alt' class='" . e($img_class) . "' style='width:100%'>";
        return $auto_link ? "<a class='" . e($anchor_class) . "' href='" . e($this->url()) . "'>$img</a>" : $img;
    }

    public function image_url($file_name = null)
    {
        return asset("/public/blog_images" . "/" . $file_name);
    }


    /**
     * Return the URL for editing the post (used for admin users)
     * @return string
     */
    public function edit_url()
    {
        return route("posts.edit", $this->id);
    }
}
