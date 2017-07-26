<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;

class FieldsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $Fdata = \DB::Select('SELECT * FROM fields');
        return view('fields.index', compact('Fdata'));
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
      $this->validate(request(),[
          'fieldname' => 'required'
      ]);

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
    public function edit($id)
    {
        $Fdata = \DB::Select('SELECT * FROM fields WHERE id="'.$id.'"');
        return view('fields.edit', compact('Fdata'));
    }


    public function update(Request $request)
    {

        if(request('fieldname') != ""){
            $Fdata = \DB::Update('UPDATE fields SET fieldname = "'. request('fieldname') .'" WHERE id="'. request('id').'"');
        }
        $data = [
            'fieldname' => request('fieldname'),
            'id' => request('id')
        ];

        return view('fields.show', compact('data'));
    }

}
