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
    public function create()
    {
      return view('fields.create');
    }
    public function store()
    {
      dd(request()->all());
      
      // create a new Field using the request data
      // Save it to the Database
      // And then redirect to the homepage.


    }
}
