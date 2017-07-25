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
      // dd(request('name'));
      // dd(request(['title','body']));
      // dd(request()->all());

      // create a new Field using the request data
      $field = new \App\Field;

      $field->fieldname = request('fieldname');
      // Save it to the Database
      $field->save();

      // And then redirect to the homepage.
      return redirect('/');

    }
}
