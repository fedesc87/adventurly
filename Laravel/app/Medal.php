<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medal extends Model
{
  public function unlocks()
  {
    return $this->belongstoMany(User::class);
  }
}
