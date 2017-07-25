<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{

    public function index()
    {
      return view('games.index');
    }
    public function show()
    {

      $games = DB::table('game')->get();

      return view('games.show', compact('games'));
    }

    public function create()
    {
      return view('games.create');
    }
}
