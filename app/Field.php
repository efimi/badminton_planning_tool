<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function games()
    {
        return $this->hasMany(Game::class);
    }

}
