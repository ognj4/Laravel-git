<?php

use App\Http\Controllers\AdminForecastsController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\ForecastsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;


Route::view('/','welcome');

Route::get('/home', function (){
    return "Hello World";
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function (){
    return view('contact');
});

Route::get('/',function (){
    return view('welcome');
});

Route::get('/prognoza', [WeatherController::class, 'index'])->middleware('auth');

// forecasts/search?name=Beo trazi sve koji sadrzi taj deo
Route::get('/forecast/search', [ForecastsController::class,'search'])
    ->name('forecast.search');

// {city} prosledjujemo preko urla i on ga odmah trazi u bazi
// samo preko id-a ali kad smo dodali :name on kaze da trazi po name (naziv polja u bazi)
Route::get('/forecast/{city:name}',[ForecastController::class,'index'])
    ->name('forecast.permalink');

/**
 * User cities
 */
Route::get('/user-cities/favourite/{city}',[\App\Http\Controllers\UserCities::class, 'favourite'])->name('city.favourite');

Route::prefix('/admin')->middleware(\App\Http\Middleware\AdminCheckMiddleware::class)->group(function () {
    Route::view('/weather', 'admin.weather_index');

    Route::post('/weather/update',[AdminWeatherController::class,'update'])
        ->name('weather.update');

    Route::view('/forecasts', 'admin.forecasts_index');

    Route::post('forecasts/create',[AdminForecastsController::class, 'create'])
        ->name('forecast.create');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
