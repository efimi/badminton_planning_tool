<?php

namespace App;



class Field extends Model
{
    public function games()
    {
        return $this->hasMany(Game::class);
    }

}
