<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //View Product
    public function index()
    {
        $products = Product::all();
        return view('welcome',compact('products'));
    }

    //Insert Product
    public function insert(Request $request)
    {
        $products = new Product();

        $products->name = $request->input('name');
        $products->quantity = $request->input('quantity');
        $products->price = $request->input('price');

        $products->save();
        return redirect('/')->with('status'."Product Inserted Successfully");
    }
}
