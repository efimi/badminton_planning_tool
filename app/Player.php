<?php

namespace App;



class Player extends Model
{
    // protected $fillable = ['firstname', 'lastname']; // das was wir erlauben
    // protected $guarded = ['user_id']; // dass was wir nicht erlauben

    // auslagerung in Model.php
    public function games()
    {
        return $this->hasMany(Game::class);
    }

}
