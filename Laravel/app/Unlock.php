<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unlock extends Model
{
    public function users()
    {
      return $this->hasMany(User::class);
    }

    public function medals()
    {
      return $this->hasMany(Medal::class);
    }
}
