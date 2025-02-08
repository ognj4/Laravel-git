<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function index (){

        $allProducts = ProductsModel::all();

        return view('allProducts',compact('allProducts'));
    }

    public function delete($product)
    {
        // select * from product where id = $product LIMIT 1
        $singleProduct = ProductsModel::where(['id' => $product])->first();
        // ako ne postoji taj id baca gresku
        if ($singleProduct == null) {
            die("Ovaj proizvod ne postoji!");
        }
        // brisanje
        $singleProduct->delete();
        //vraca korak nazad od brisanja
        return redirect()->back();
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
