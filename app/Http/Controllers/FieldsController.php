<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Game;

class FieldsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $Fdata = Field::all();
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
        $Fdata = Field::where('fieldname','=', request('fieldname'))->get();
        if(!isset($Fdata[0])) {
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
        $Fdata = Field::where('id','=', $id)->get();
        return view('fields.edit', compact('Fdata'));
    }


    public function update(Request $request)
    {

        if(request('fieldname') != ""){
            $Fdata = Field::where('fieldname','=', request('fieldname'))->get();
            if(!isset($Fdata[0])) {
                $Fdata = Field::where('id', '=', request('id'))->update(['fieldname'=> request('fieldname')]);
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
        $delete = Game::find($id)->delete();
        $delete = Field::find($id)->delete();

        return redirect('/spielfeld');
    }


}
