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


        return view('search_results', compact('cities'));
    }
}
