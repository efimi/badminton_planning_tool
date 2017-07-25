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
                            JOIN players AS p on g.firstPlayerId=p.id 
                            JOIN players AS p2 on g.secondPlayerId=p2.id
                            JOIN field AS f on g.fieldId=f.id
                            WHERE date=CURRENT_DATE order by fieldId ASC, time ASC');

      return view('games.show', compact('games'));
    }

    public function create()
    {
      return view('games.create');
    }
}
