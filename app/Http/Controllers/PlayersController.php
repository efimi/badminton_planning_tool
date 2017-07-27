<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;

class PlayersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

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
                                    p2.lastname as Secondname,
                                    f.fieldname as Field
                                from
                                    games AS g
                                    JOIN players AS p ON p.id=g.first_player_id
                                    JOIN players AS p2 ON p2.id=g.second_player_id
                                    JOIN fields AS f ON f.id=g.field_id
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
      // validate inputs/ make them required

      $this->validate(request(),[
          'firstname' => 'required',
          'lastname'  => 'required'
      ]);

      // // // create a new Field using the request data
      //  $player = new \App\Player;
      // //
      //  $player->firstname = request('firstname');
      //  $player->lastname = request('lastname');
      // // // Save it to the Database
      //  $player->save();

      // Model muss angepasst werden
      Player::create(request(['firstname','lastname']));


      $instanceName = "Spieler";
      // And then redirect to the homepage.
      return view('created', compact('instanceName'));

    }
    public function edit($id)
    {
        $Pdata = \DB::Select('SELECT * FROM players WHERE id="'.$id.'"');
        return view('players.edit', compact('Pdata'));
    }

    public function update(Request $request)
    {

        if(request('firstname') != "") {
            $Pdata = \DB::SELECT('SELECT * FROM players WHERE firstname="' . request('firstname') . '"');
            if (empty($Pdata)) {
                $Pdata = \DB::Update('UPDATE players SET firstname = "' . request('firstname') . '" WHERE id="' . request('id') . '"');
            }
        }
        if(request('lastname') != "") {
            $Pdata = \DB::SELECT('SELECT * FROM players WHERE lastname="' . request('lastname') . '"');
            if (empty($Pdata)) {
                $Pdata = \DB::Update('UPDATE players SET lastname = "' . request('lastname') . '" WHERE id="' . request('id') . '"');
            }
        }
        $data = [
            'fieldname' => request('fieldname'),
            'id' => request('id')
        ];

        $players = \DB::Select('SELECT * FROM players ');
        return view('players.index', compact('players'));
    }

    public function delete(Request $request, $id)
    {
        $players = \DB::Select('SELECT * FROM players WHERE id="'.$id.'"');
        $delete = \DB::Delete('DELETE FROM games WHERE first_player_id='.$id.' OR second_player_id='.$id);
        $delete = Player::find($id);
        $delete ->delete();

        return redirect('/spieler');
    }

}
