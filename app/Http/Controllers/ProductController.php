<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    //View Product
    public function show()
    {
        $products = Product::all();
        return view('home',compact('products'));
    }

    //Insert Product
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:[a-zA-Z]|max:50',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }else{
            $products = new Product();

            $products->name = $request->input('name');
            $products->quantity = $request->input('quantity');
            $products->price = $request->input('price');

            $products->save();
            return redirect('/home')->with('status'."Product Inserted Successfully");
        }
    }

    //Edit Product
    public function edit($id)
    {
        $products = Product::find($id);
        return view('edit', compact('products'));
    }

    //Update Product
    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        $products->name = $request->input('name');
        $products->quantity = $request->input('quantity');
        $products->price = $request->input('price');

        $products->update();
        return redirect('/home')->with('status'."Product Updated Successfully");
    }

    //Delete Product
    public function delete($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect('/home')->with('status',"Product Deleted Successfully");
    }
}
