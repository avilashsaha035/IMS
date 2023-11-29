@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center text-success fw-bold">Welcome to Inventory Management System</h1>
                </div>
                <div class="card-body">
                    @if (Route::has('login'))
                        @auth
                            <h2 class="text-center text-success fw-bold">Add Products</h2>
                            <form action="{{ route('product.insert') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                                </div>
                                <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label fw-bold">Quantity</label>
                                <input type="number" name="quantity" class="form-control" id="exampleInputPassword1">
                                <span class="text-danger">
                                    @error('quantity')
                                        {{ $message }}
                                    @enderror
                                </span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label fw-bold">Price</label>
                                    <input type="number" name="price" class="form-control" id="exampleInputPassword1">
                                    <span class="text-danger">
                                        @error('price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-success">Add</button>
                            </form>


                        @else
                            <a href="{{ route('login') }}" class="btn btn-success font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>








@endsection


