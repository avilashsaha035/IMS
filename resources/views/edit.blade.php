@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-2"></div>
    <div class="mt-5 card col-md-8">
        <div class="card-header">
            <h4> Edit/Update Product </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/product/update/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{ $products->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" value="{{ $products->quantity }}" class="form-control" name="quantity">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Price</label>
                        <input type="number" value="{{ $products->price }}" class="form-control" name="price">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
<div class="col-md-2"></div>
</div>
@endsection
