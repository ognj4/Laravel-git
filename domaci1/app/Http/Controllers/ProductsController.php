<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function allProducts (){

        $allProducts = ProductsModel::all();

        return view('products',compact('allProducts'));
    }

    public function addProduct (Request $request){

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'amount' =>'required|string',
            'price' => 'required|string',
            'image' => 'required|string'
        ]);

        ProductsModel::create([
           'name' => $request->get('name'),
            'description' => $request->get('description'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'image' => $request->get('image')


        ]);

    return redirect('/shop');


    }


}
