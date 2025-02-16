<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {

        // ono sto smo uneli u url je ime grada, uzima id od tog polja i njega trazi
        $prognoze = ForecastsModel::where(['city_id' => $city->id])->get();

        return view ('forecasts', compact('prognoze'));
    }
}
