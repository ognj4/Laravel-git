<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/about', 'about');

Route::get('/', [\App\Http\Controllers\HomepageController::class,'index']);

Route::get('/shop', [\App\Http\Controllers\ShopController::class,'index']);

Route::get("/contact", [ContactController::class, "index"]);

Route::get('/admin/all-contacts', [ContactController::class, "getAllContacts"]);


Route::get('/admin/all-products', [\App\Http\Controllers\ProductsController::class, "index"])
    ->name('sviProizvodi');


Route::get('/admin/delete-product/{product}', [\App\Http\Controllers\ProductsController::class, "delete"])
    ->name('obrisiProizvod'); // "drugo" ime za rutu koju pozivamo preko route ('') u bladeu
Route::get('/admin/delete-contact/{contact}', [\App\Http\Controllers\ContactController::class, "delete"])
    ->name('obrisiKontakt');


Route::post("/send-contact", [ContactController::class, "sendContact"]);

// stranica za prikaz forme
Route::view('/admin/add-product', 'addProduct');
// stranica za snimanje podataka
Route::post('/admin/save-product',[\App\Http\Controllers\ProductsController::class,'saveProduct'])
    ->name('snimanjeOglasa');

// {id} u uri znaci da je to varijabla i nju stavljamo i u funckciju u controller
Route::get('/admin/product/edit/{id}',[\App\Http\Controllers\ProductsController::class,'singleProduct'])
    ->name('product.single');
Route::post('admin/product/save/{id}',[\App\Http\Controllers\ProductsController::class, 'edit'])
    ->name('product.save');
