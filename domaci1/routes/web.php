<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomepageController::class,'index']);

Route::view('/about', 'about');

Route::get('/shop', [\App\Http\Controllers\ShopController::class,'index']);

Route::get("/contact", [ContactController::class, "index"]);

Route::get('admin/all-contacts', [ContactController::class, "getAllContacts"]);
