<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FieldsController extends Controller
{
    //
    public function index()
    {
      return view('fields.index');
    }
    public function show()
    {
      return view('fields.show');
    }
}
