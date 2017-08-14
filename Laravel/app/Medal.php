<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medal extends Model
{
  public function user()
  {
    return $this->hasMany(User::class);
  }
}
