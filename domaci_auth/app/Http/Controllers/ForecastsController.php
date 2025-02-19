<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;

class ForecastsController extends Controller
{
    public function search(Request $request) {

        $cityName = $request->get('city');


        // SELECT * FROM cities where name LIKE "
        $cities = CitiesModel::where("name", "LIKE", "%$cityName%")->get();


        // provera da li grad postoji
        if (count($cities) === 0) {
            // privremeno ispisivanje greske koje nestaje
            return redirect()->back()->with('error','Nismo pronasli gradove');
        }

        return view('search_results', compact('cities'));
    }
}
