<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayersController extends Controller
{
    //
    public function index()
    {
      return view('palyers.index');
    }
    public function show()
    {
      return view('players.show');
    }
}
