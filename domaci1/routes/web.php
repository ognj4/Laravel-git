<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomepageController::class,'index']);
Route::view('/about', 'about');
Route::get('/shop', [\App\Http\Controllers\ShopController::class,'index']);
Route::get("/contact", [ContactController::class, "index"]);

Route::get('admin/all-contacts', [ContactController::class, "getAllContacts"]);

Route::post("/send-contact", [ContactController::class, "sendContact"]);

Route::view('/admin/dodaj-product', 'addProduct');

Route::post('/admin/add-product',[\App\Http\Controllers\ProductsController::class,'addProduct']);

Route::get('admin/products',[\App\Http\Controllers\ProductsController::class,'allProducts']);

