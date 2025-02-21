<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForecastsController extends Controller
{
    public function search(Request $request) {

        $cityName = $request->get('city');


        // SELECT * FROM cities where name LIKE "
        // ::with() - preloading olaksava bazu
        $cities = CitiesModel::with('todaysForecast')->where("name", "LIKE", "%$cityName%")->get();


        // provera da li grad postoji
        if (count($cities) === 0) {
            // privremeno ispisivanje greske koje nestaje
            return redirect()->back()->with('error','Nismo pronasli gradove');
        }

        $userFavourites = [];
        if(Auth::check()) {
            $userFavourites = Auth::user()->cityFavourites;
            // pretvorili smo u array svih favourite, da bi lakse proverili kasnije
            $userFavourites = $userFavourites->pluck('city_id')->toArray();
        }




        return view('search_results', compact('cities', 'userFavourites'));
    }
}
