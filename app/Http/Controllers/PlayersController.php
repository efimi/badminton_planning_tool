<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;
use App\Game;

class PlayersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']);
    }

    //
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }
    public function show($id)
    {
        $player = Player::where('id', $id)->get();
        // $player = \DB::SELECT('SELECT * from players where id='.$id);
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
        //$game = Player::where()->



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

        if (request('firstname') != "" AND request('lastname') != ""){
            $Pdata = Player::where('firstname', '=', request('firstname'))->where('lastname', '=', request('lastname'))->get();
            if(!isset($Pdata[0])){
                Player::create(request(['firstname','lastname']));
            }else{
                return back()->withErrors([
                    'massage' => 'Einer der Spieler hat bereits ein den gleichen Namen.'
                ]);
            }
        }



      $instanceName = "Spieler";
      // And then redirect to the homepage.
      return view('created', compact('instanceName'));

    }
    public function edit($id)
    {
        $Pdata = Player::where('id',$id)->get();

        return view('players.edit', compact('Pdata'));
    }

    public function update(Request $request)
    {
        if (request('firstname') != "" AND request('lastname') != ""){
            $Pdata = Player::where('firstname','=', request('firstname'))->where('lastname', '=', request('lastname'))->get();
            //dd($Pdata[0]);
                if(!isset($Pdata[0])){
                    $Pdata = Player::where('id', request('id'))->update(['firstname'=> request('firstname')]);
                    $Pdata = Player::where('id', request('id'))->update(['lastname'=> request('lastname')]);
                }else{
                    return back()->withErrors([
                        'massage' => 'Einer der Spieler hat bereits ein den gleichen Namen.'
                    ]);
                }


        }elseif(request('firstname') != "") {
            $Pdata = Player::where('firstname','=', request('firstname'))->get();
            $CPdata =  Player::find(request('id'));
            if (!isset($Pdata[0])) {
                $Pdata = Player::where('id', '=', request('id') )->update(['firstname' => request('firstname')]);
            }elseif($Pdata[0]->lastname != $CPdata[0]->lastname ){
                $Pdata = Player::where('id', '=', request('id') )->update(['firstname' => request('firstname')]);
           }else{
                return back()->withErrors([
                    'massage' => 'Einer der Spieler hat bereits ein den gleichen Namen.'
                ]);
            }
        }elseif(request('lastname') != "") {
            $Pdata = Player::where('lastname','=', request('lastname'))->get();
            $CPdata =  Player::find(request('id'));
            if (!isset($Pdata[0])) {
                $Pdata = Player::where('id', '=', request('id') )->update(['lastname' => request('lastname')]);
            }elseif($Pdata[0]->firstname != $CPdata[0]->firstname ){
                $Pdata = Player::where('id', '=', request('id') )->update(['lastname' => request('lastname')]);
            }else{
                return back()->withErrors([
                    'massage' => 'Einer der Spieler hat bereits ein den gleichen Namen.'
                ]);
            }
        }


        $data = [
            'fieldname' => request('fieldname'),
            'id' => request('id')
        ];

        $players = Player::all();
        return view('players.index', compact('players'));
    }

    public function delete(Request $request, $id)
    {
        $players = Player::find($id);
        $delete = Game::where('first_player_id','=', $id)->orWhere('second_player_id', '=', $id)->delete();
        $delete = Player::find($id);
        $delete ->delete();

        return redirect('/spieler');
    }

}
