<?php

namespace App\Http\Controllers;

use App\Models\Ocene;
use Illuminate\Http\Request;

class OceneController extends Controller
{
    public function allOcene(){
        $ocene = Ocene::all();

        return view('welcome', compact('ocene'));
    }

    public function addGrade(Request $request){



        // validiramo podatke
        $request->validate([
            'profesor'=>'string|required',
            'predmet'=>'string|required',
            'ocena'=>'integer|required|min:1|max:5',

        ]);





        // upis u bazu
        Ocene::create([
            'predmet'=>$request->get('predmet'),
            'ocena'=>$request->get('ocena'),
            'profesor'=>$request->get('profesor'),
        ]);

        return redirect('/');

    }
}
