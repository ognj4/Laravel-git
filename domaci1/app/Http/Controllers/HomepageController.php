<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index ()
    {

        // najnovijih 6 iz baze
        $products = ProductsModel::orderByDesc('id')->take(6)->get();

        $sat = date("H");
        $trenutnoVreme =date('H:i:s');

        return view('welcome', compact('trenutnoVreme','sat', 'products'));
    }
}
