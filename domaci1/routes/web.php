<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::view('/about', 'about');

Route::get('/', [HomepageController::class,'index']);

Route::get('/shop', [ShopController::class,'index']);

Route::get("/contact", [ContactController::class, "index"]);



Route::middleware(['auth', AdminCheckMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/all-contacts', [ContactController::class, "getAllContacts"]);

    Route::get('/all-products', [ProductsController::class, "index"])
        ->name('sviProizvodi');


    Route::get('/delete-product/{product}', [ProductsController::class, "delete"])
        ->name('obrisiProizvod'); // "drugo" ime za rutu koju pozivamo preko route ('') u bladeu

    Route::get('/delete-contact/{contact}', [ContactController::class, "delete"])
        ->name('obrisiKontakt');

    // stranica za prikaz forme
    Route::view('/add-product', 'addProduct');

    Route::post("/send-contact", [ContactController::class, "sendContact"]);

    // stranica za snimanje podataka
    Route::post('/save-product',[ProductsController::class,'saveProduct'])
        ->name('snimanjeOglasa');

    // {product} u uri znaci da je to varijabla i nju stavljamo u funckciju u controller-u
    Route::get('/product/edit/{product}',[ProductsController::class,'singleProduct'])
        ->name('product.single');

    Route::post('/product/save/{product}',[ProductsController::class, 'edit'])
        ->name('product.save');

});


// ucitava auth rute, must have
require __DIR__.'/auth.php';
