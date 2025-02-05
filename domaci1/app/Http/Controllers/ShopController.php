<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{


    public function index() {

        $products = [
            "Iphone 14", "Samsung S24", "Iphone 15 pro"
        ];


        return view('shop',compact('products'));
    }
}
