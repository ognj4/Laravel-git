<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'welcome');

Route::get('/about', function () {
    return view('about');
});

Route::view('/shop', 'shop');
Route::view('contact', 'contact');
