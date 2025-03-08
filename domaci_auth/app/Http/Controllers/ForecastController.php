<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Services\WeatherService;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {

        $weatherService = new WeatherService();

        $jsonResponse = $weatherService->getSunsetAndSunrise($city->name);


        $sunrise = $jsonResponse['astronomy']['astro']['sunrise'];
        $sunset = $jsonResponse['astronomy']['astro']['sunset'];


        return view('forecasts', compact('city', 'sunrise', 'sunset'));
    }
}
