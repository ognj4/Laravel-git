<?php

namespace App\Http\Controllers;

class WeatherController extends Controller
{
    public function index()
    {
        $prognoza = [
            'Beograd' => 22,
            'Novi Sad' => 23,
            'Sarajevo' => 25,
            'Zagreb' => 26,
        ];
        return view('weather', compact('prognoza'));
    }
}
