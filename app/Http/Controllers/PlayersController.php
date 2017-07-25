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
                                    JOIN players AS p ON p.id=g.firstPlayerId
                                    JOIN players AS p2 ON p2.id=g.SecondPlayerId
                                where
                                 g.firstPlayerId='.$id.' 
                                 OR g.secondPlayerId='.$id.' 
                                 ORDER BY date DESC, time ASC');


        return view('players.show', compact('player', 'game'));
    }
    public function create()
    {
      return view('players.create');
    }
}
