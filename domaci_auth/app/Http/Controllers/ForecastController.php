<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use Illuminate\Support\Facades\Http;

class ForecastController extends Controller
{
    public function index(CitiesModel $city)
    {

        $response = Http::get(env('weather_api_url').'v1/astronomy.json', [
            'key' => env('WEATHER_API_KEY'),
            'q' => $city->name,
            'aqi' =>'no',
            'days' => 1,
        ]);

        $jsonResponse = $response->json();
        $sunrise = $jsonResponse['astronomy']['astro']['sunrise'];
        $sunset = $jsonResponse['astronomy']['astro']['sunset'];


        return view ('forecasts', compact('city', 'sunrise','sunset'));
    }
}
