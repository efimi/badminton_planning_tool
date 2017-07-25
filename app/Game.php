<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
