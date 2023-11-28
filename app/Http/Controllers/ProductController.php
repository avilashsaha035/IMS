<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;


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
            'name' => 'required|string|max:50',
            'quantity' => 'required|numeric|digits:3',
            'price' => 'required|numeric|digits:7',
        ]);

        if ($validator->fails()) {
            // return response()->json(['errors' => $validator->errors()]);
            return $validator->errors();
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