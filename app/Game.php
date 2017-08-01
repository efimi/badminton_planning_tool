<?php

namespace App;



class Game extends Model
{

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function player_first()
    {
        return $this->belongsTo(Player::class, 'first_player_id');
    }

    public function player_second()
    {
        return $this->belongsTo(Player::class, 'second_player_id');
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
