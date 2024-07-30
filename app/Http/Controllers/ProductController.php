<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    //View Product
    public function show(Request $request)
    {
        if($request->ajax()){
            $products = Product::all();
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $edit_url = url('/product/edit/'.$row->id);
                    $delete_url = url('/product/delete/'.$row->id);
                    $btn = '<a href="'.$edit_url.'" type="button" class="btn btn-success"> <i class="las la-pen"></i> </a>';
                    $btn .= '<a href="'.$delete_url.'" type="button" class="btn btn-danger"> <i class="las la-trash"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('home');
    }

    //Insert Product
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:([a-zA-Z\s]$)|max:50',
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
