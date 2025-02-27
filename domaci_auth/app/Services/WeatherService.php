<?php

namespace App\Services; // putanja do fajla

use Illuminate\Support\Facades\Http;

class WeatherService {
    public function getForecast($city)
    {
        $response = Http::get(env('weather_api_url').'v1/forecast.json', [
            'key' => env('WEATHER_API_KEY'),
            'q' => $city,
            'aqi' =>'no',
            'days' => 1,
        ]);

        return $response->json();
    }
    public function getSunsetAndSunrise($city)
    {
        $response = Http::get(env('weather_api_url').'v1/astronomy.json', [
            'key' => env('WEATHER_API_KEY'),
            'q' => $city,
            'aqi' =>'no',
        ]);

         return $response->json();

    }
}
