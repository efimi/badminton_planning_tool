<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayersController extends Controller
{
    //
    public function index()
    {

        $players = \DB::Select('SELECT * FROM players ');
      return view('players.index', compact('players'));
    }
    public function show($id)
    {
        $player = \DB::SELECT('SELECT * from players where id='.$id);
        $game = \DB::SELECT('SELECT
                                    g.date as Date,
                                    g.time as Time,
                                    p.lastname as Firstname,
                                    p2.lastname as Secondname
                                from
                                    games AS g
                                    JOIN players AS p ON p.id=g.first_player_id
                                    JOIN players AS p2 ON p2.id=g.second_player_id
                                where
                                 g.first_player_id='.$id.'
                                 OR g.second_player_id='.$id.'
                                 ORDER BY date DESC, time ASC');


        return view('players.show', compact('player', 'game'));
    }
    public function create()
    {
      return view('players.create');
    }
    public function store()
    {
      // create a new Field using the request data
      $player = new \App\Player;

      $player->firstname = request('firstname');
      $player->lastname = request('lastname');
      // Save it to the Database
      $player->save();

      // And then redirect to the homepage.
      return redirect('/');

    }
}
