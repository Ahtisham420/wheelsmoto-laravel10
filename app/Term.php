<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    //

    protected $table = 'terms and condition';
    protected $fillable = [
        'id',
        'body'
    ];



    public function generate_introduction($max_len = 500)
    {
        $base_text_to_use = $this->body;
        if (!trim($base_text_to_use)) {
            $base_text_to_use = $this->post_body;
        }
        $base_text_to_use = strip_tags($base_text_to_use);

        $intro = str_limit($base_text_to_use, (int) $max_len);
        return nl2br(e($intro));
    }
}
