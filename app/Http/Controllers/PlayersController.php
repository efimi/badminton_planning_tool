<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayersController extends Controller
{
    //
    public function index()
    {
      return view('players.index');
    }
    public function show()
    {
      return view('players.show');
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
