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

        $Fdata = \DB::SELECT('SELECT * FROM fields WHERE fieldname="' . request('fieldname') . '"');
        if(empty($Fdata)) {
            Field::create(request(['fieldname']));
        }else{
            return back()->withErrors([
                'massage' => 'Eines der Spielfelder hat bereits ein den gleichen Namen.'
            ]);
        }
      // And then redirect to the homepage.
      $instanceName = "Spielfeld";
      // And then redirect to the landingpage.
      return view('created', compact('instanceName'));

    }
    public function edit($id)
    {
        $Fdata = \DB::Select('SELECT * FROM fields WHERE id="'.$id.'"');
        return view('fields.edit', compact('Fdata'));
    }


    public function update(Request $request)
    {

        if(request('fieldname') != ""){
            $Fdata = \DB::SELECT('SELECT * FROM fields WHERE fieldname="' . request('fieldname') . '"');
            if(empty($Fdata)) {
                $Fdata = \DB::Update('UPDATE fields SET fieldname = "' . request('fieldname') . '" WHERE id="' . request('id') . '"');
            }else{
                return back()->withErrors([
                    'massage' => 'Eines der Spielfelder hat bereits ein den gleichen Namen.'
                ]);
            }
        }

        $data = [
            'fieldname' => request('fieldname'),
            'id' => request('id')
        ];

        return view('fields.show', compact('data'));
    }

    public function delete(Request $request, $id)
    {
        $delete = \DB::Delete('DELETE FROM games WHERE field_id='.$id);
        $delete = Field::find($id);
        $delete ->delete();

        return redirect('/spielfeld');
    }


}
