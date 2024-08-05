<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WantedChat extends Model
{
  protected $table = "chat_wanted";
  protected $fillable = [
      "id",
      "description",
      "car_id",
      "car_id",
      "car_id",
      "to_id",
      "from_id",
      "from_mail",
      "to_mail",
       "mail_status"

  ];
    public function to_same_user()
    {
        return $this->belongsTo("App\User","to_id","id");
    }
    public function car_wanted_same()
    {
        return $this->belongsTo("App\Wanted","car_id","id");
    }
    public function from_user()
    {
        return $this->belongsTo("App\User","from_id","id");
    }

}
