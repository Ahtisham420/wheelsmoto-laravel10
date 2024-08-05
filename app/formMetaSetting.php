<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class formMetaSetting extends Model
{
    //
    protected $table = "form_meta_settings";

    public const active = 0;
    public const inactive = 1;
    public const banned = 2;
    public const pending = 3;
}
