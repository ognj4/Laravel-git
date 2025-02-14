<?php

namespace App\Http\Controllers;

class ForecastController extends Controller
{
    public function index ($city)
    {
        $city = strtolower($city);
        $forecasts = [
            'beograd' => [22,12,33,14,17],
            'sarajevo' => [24,12,4,17,21],
        ];

        if (!array_key_exists($city,$forecasts)){
            die("Ovaj grad ne postoji");
        }
    }
}
