<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\OceneController::class, 'allOcene']);
// isti nacin samo bez kontrolera
//Route::get('/', function (){
//    $ocene = \App\Models\Ocene::all();
//    return view('welcome', compact('ocene'));
//});

// kada se dodje na /dodaj-ocenu ucitaj blade addGrade.blade.php
Route::view('/dodaj-ocenu', 'addGrade');

// hvata post formu i prosledjuje controleru na obradu
Route::post('/add-user-grade', [\App\Http\Controllers\OceneController::class, 'addGrade']);
