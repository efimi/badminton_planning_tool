<?php

use Illuminate\Database\Seeder;
use App\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=10;$i++) {
            Player::insert([
                'firstname' => 'Spieler '.$i,
                'lastname' => str_random(8)
            ]);
        }
    }
}
