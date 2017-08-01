<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;
use App\Player;
use App\Field;


class GamesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show', 'index']);
    }

    public function index()
    {
      $Gdata = Game::orderBy('date', 'desc')->orderBy('time', 'asc')->get();
      return view('games.index', compact('Gdata'));

    }
    public function show()
    {

      $games = Game::where('date','=', date('Y-m-d'))->orderBy('field_id', 'asc')->orderBy('time', 'asc')->get();
      // database.php: Line 53 -> befor strict=true after strict=false ;
      $dates = Game::groupBy('date')->orderBy('date', 'desc')->get();

      return view('games.show', compact('games', 'dates'));
    }


    public function create()
    {
        $Pdata = Player::all();
        $Fdata = Field::all();
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
            $time = Game::where('date', '=', request('date'))
                ->where('time','=', request('time'))
                ->where('field_id', '=', request('field'))
                ->get();
            $doubleCheck = Game::where('time', '=', request('time'))
                            ->where(function($query){
                                $query->where('first_player_id','=', request('first_player_id'))
                                        ->orWhere('first_player_id','=', request('second_player_id'));
                            })->where(function($query){
                                $query->where('second_player_id','=', request('first_player_id'))
                                        ->where('second_player_id','=', request('second_player_id'));
                            })->where('id', '!=', request('id'))->get();

            if (!isset($time[0]) AND !isset($doubleCheck[0])) {
                $game->first_player_id = request('first_player_id');
                $game->second_player_id = request('second_player_id');
                $game->field_id = request('field');
                $game->time = request('time');
                $game->date = request('date');
                // Save it to the Database
                $game->save();
            }else{
                if(isset($doubleCheck[0])){
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
        $Pdata = Player::all();
        $Fdata = Field::all();
        $Gdata = Game::find($id)->get();
        return view('games.edit', compact('Pdata', 'Gdata', 'Fdata'));
    }

    public function update(Request $request)
    {
            if(request('first_player_id' ) != request('second_player_id')) {

                $time = Game::where('date', '=', request('date'))
                    ->where('time','=', request('time'))
                    ->where('field_id', '=', request('field'))
                    ->get();
                $doubleCheck = Game::where('time', '=', request('time'))
                    ->where(function($query){
                        $query->where('first_player_id','=', request('first_player_id'))
                            ->orWhere('first_player_id','=', request('second_player_id'));
                    })->where(function($query){
                        $query->where('second_player_id','=', request('first_player_id'))
                            ->where('second_player_id','=', request('second_player_id'));
                    })->where('id', '!=', request('id'))->get();

                if (!isset($time[0]) AND !isset($doubleCheck[0])) {
                    $up_Data = Game::where('id','=', request('id'))
                                ->update([
                                    'first_player_id' => request('first_player_id'),
                                    'second_player_id' =>  request('second_player_id'),
                                    'field_id' => request('field'),
                                    'time' => request('time'),
                                    'date' => request('date')
                                ]);
                }else{
                    if(isset($doubleCheck[0])){
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

        $Gdata = Game::orderBy('date', 'desc')->orderBy('time', 'asc')->get();
        return view('games.index', compact('Gdata'));
    }

    public function delete(Request $request, $id)
    {

        $delete = Game::find($id);
        $delete ->delete();

        return redirect('/spiel/anzeigen');
    }

    public function table(){

        $games = Game::where('date','=', date('Y-m-d'))->orderBy('date', 'desc')->orderBy('time', 'asc')->get();
        return view('layouts.show', compact('games'));
    }
}
