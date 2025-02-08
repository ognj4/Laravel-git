<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/about', 'about');

Route::get('/', [\App\Http\Controllers\HomepageController::class,'index']);
Route::get('/shop', [\App\Http\Controllers\ShopController::class,'index']);

Route::get("/contact", [ContactController::class, "index"]);

Route::get('/admin/all-contacts', [ContactController::class, "getAllContacts"]);
Route::get('/admin/all-products', [\App\Http\Controllers\ProductsController::class, "index"]);
Route::get('/admin/delete-product/{product}', [\App\Http\Controllers\ProductsController::class, "delete"]);


Route::post("/send-contact", [ContactController::class, "sendContact"]);


Route::view('/admin/dodaj-product', 'addProduct');
Route::post('/admin/add-product',[\App\Http\Controllers\ProductsController::class,'addProduct']);

