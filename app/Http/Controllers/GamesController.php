<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;


class GamesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show', 'index']);
    }

    public function index()
    {
        $Gdata = \DB::Select('SELECT
                                    g.id AS id,
                                    p.lastname as Firstname,
                                    p2.lastname as Secondname,
                                    f.fieldname as Field,
                                    g.date as Date,
                                    g.time as Time
                                FROM
                                    games AS g
                                    JOIN players AS p ON p.id=g.first_player_id
                                    JOIN players AS p2 ON p2.id=g.second_player_id
                                    JOIN fields AS f ON f.id=g.field_id
                                    order by date DESC, time ASC
                                    ');
      return view('games.index', compact('Gdata'));

    }
    public function show()
    {

      $games = \DB::Select('SELECT
                             p.firstname AS firstPlayerFirst, 
                             p.lastname AS firstPlayer,
                             p2.firstname AS secondPlayerFirst,
                             p2.lastname AS secondPlayer,
                             f.fieldname AS field,
                             g.date,
                             g.time

                            FROM games AS g
                            JOIN players AS p on g.first_player_id=p.id
                            JOIN players AS p2 on g.second_player_id=p2.id
                            JOIN fields AS f on g.field_id=f.id
                            WHERE date=CURRENT_DATE order by field_id ASC, time ASC');

      $dates = \DB::Select('SELECT date FROM games GROUP BY date ORDER BY date DESC');
      return view('games.show', compact('games', 'dates'));
    }


    public function create()
    {
        $Pdata = \DB::Select('SELECT * FROM players');
        $Fdata = \DB::Select('SELECT * FROM fields');
      return view('games.create', compact('Pdata', 'Fdata'));
    }
    public function store()
    {
      // validation of data
      $this->validate(request(),[
          'first_player_id' => 'required',
          'second_player_id' => 'required',
          'field' => 'required',
          'time' => 'required',
          'date' => 'required'
      ]);

        // create a new Field using the request data
        $game = new \App\Game;

        if(request('first_player_id' ) != request('second_player_id')) {
            $time = \DB::Select('SELECT time FROM games WHERE date="' . request('date') . '" AND time="' . request('time') . '" AND field_id ="'.request('field') .'"');
            $doubleCheck = \DB::Select('SELECT
                                          *
                                        FROM
                                          games
                                        WHERE
                                          time="' . request('time') . '"
                                        AND
                                          (
                                            first_player_id="' . request('first_player_id') . '"
                                          OR
                                            first_player_id="' . request('second_player_id') . '"
                                          )
                                        AND
                                          (
                                            second_player_id="' . request('first_player_id') . '"
                                          OR
                                            second_player_id="' . request('second_player_id') . '"
                                          )
                                          AND id != "'. request('id') .'"
                                          ');
            if (empty($time) AND empty($doubleCheck)) {
                $game->first_player_id = request('first_player_id');
                $game->second_player_id = request('second_player_id');
                $game->field_id = request('field');
                $game->time = request('time');
                $game->date = request('date');
                // Save it to the Database
                $game->save();
            }else{
                if(!empty($doubleCheck)){
                    return back()->withErrors([
                        'massage' => 'Einer der Spieler hat bereits ein angesetztes Spiel zu dieser Zeit'
                    ]);
                }else{
                    return back()->withErrors([
                        'massage' => 'Es findet bereits ein Spiel zu dieser Zeit'
                    ]);
                }
            }
        }else{
            return back()->withErrors([
                'massage' => 'Der Spieler wurde doppelt ausgewählt'
            ]);
        }

        $instanceName = "Spiel";
        // And then redirect to the landingpage.
        return view('created', compact('instanceName'));

    }
    public function edit($id)
    {

        $Pdata = \DB::Select('SELECT * FROM players');
        $Fdata = \DB::Select('SELECT * FROM fields');
        $Gdata = \DB::Select('SELECT * FROM games WHERE id="'.$id.'"');

        return view('games.edit', compact('Pdata', 'Gdata', 'Fdata'));
    }

    public function update(Request $request)
    {
            if(request('first_player_id' ) != request('second_player_id')) {

                $time = \DB::Select('SELECT id FROM games WHERE date="' . request('date') . '" AND time="' . request('time') . '"AND id != "'. request('id').'"');
                $doubleCheck = \DB::Select('SELECT
                                          *
                                        FROM
                                          games
                                        WHERE
                                          time="' . request('time') . '"
                                        AND
                                          (
                                            first_player_id="' . request('first_player_id') . '"
                                          OR
                                            first_player_id="' . request('second_player_id') . '"
                                          )
                                        AND
                                          (
                                            second_player_id="' . request('first_player_id') . '"
                                          OR
                                            second_player_id="' . request('second_player_id') . '"
                                          )
                                          AND id != "'. request('id') .'"
                                          ');
                if (empty($time) AND empty($doubleCheck)) {
                    $up_Data = \DB::Update('UPDATE games
                                            SET first_player_id="' . request('first_player_id') . '",
                                                second_player_id="' . request('second_player_id') . '",
                                                field_id="' . request('field') . '",
                                                time="' . request('time') . '",
                                                date="'.request('date').'"
                                            WHERE
                                                id="' . request('id') . '"');

                }else{
                    if(!empty($doubleCheck)){
                        return back()->withErrors([
                            'massage' => 'Einer der Spieler hat bereits ein angesetztes Spiel zu dieser Zeit'
                        ]);
                    }else{
                        return back()->withErrors([
                            'massage' => 'Es findet bereits ein Spiel zu dieser Zeit'
                        ]);
                    }
                }
            }else{
                return back()->withErrors([
                    'massage' => 'Der Spieler wurde doppelt ausgewählt'
                ]);
            }


        $Gdata = \DB::Select('SELECT
                                    g.id AS id,
                                    p.lastname as Firstname,
                                    p2.lastname as Secondname,
                                    f.fieldname as Field,
                                    g.date as Date,
                                    g.time as Time
                                FROM
                                    games AS g
                                    JOIN players AS p ON p.id=g.first_player_id
                                    JOIN players AS p2 ON p2.id=g.second_player_id
                                    JOIN fields AS f ON f.id=g.field_id
                                    order by date DESC, time ASC
                                    ');
        return view('games.index', compact('Gdata'));
    }

    public function delete(Request $request, $id)
    {

        $delete = Game::find($id);
        $delete ->delete();

        return redirect('/spiel/anzeigen');
    }
}
