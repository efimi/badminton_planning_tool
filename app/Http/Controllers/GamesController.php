<?php

namespace App\Http\Controllers;

use App\Game;


class GamesController extends Controller
{

    public function index()
    {
      return view('games.index');
    }
    public function show()
    {

      $games = \DB::Select('SELECT 
                             p.lastname AS firstPlayer,
                             p2.lastname AS secondPlayer,
                             f.fieldname AS field,
                             g.date,
                             g.time 
                             
                            FROM games AS g 
                            JOIN players AS p on g.first_player_id=p.id 
                            JOIN players AS p2 on g.second_player_id=p2.id
                            JOIN fields AS f on g.field_id=f.id
                            WHERE date=CURRENT_DATE order by field_id ASC, time ASC');

      return view('games.show', compact('games'));
    }


    public function create()
    {
        $Pdata = \DB::Select('SELECT * FROM players');
        $Fdata = \DB::Select('SELECT * FROM fields');
      return view('games.create', compact('Pdata', 'Fdata'));
    }
    public function store()
    {
        // create a new Field using the request data
        $game = new \App\Game;

        if(request('first_player_id' ) != request('second_player_id')) {
            $time = \DB::Select('SELECT time FROM games WHERE date="' . request('date') . '" AND time="' . request('time') . '"');

            if (empty($time)) {
                $game->first_player_id = request('first_player_id');
                $game->second_player_id = request('second_player_id');
                $game->field_id = request('field');
                $game->time = request('time');
                $game->date = request('date');
                // Save it to the Database
                $game->save();
            }
        }

        // And then redirect to the homepage.
        return redirect('/');

    }
}
