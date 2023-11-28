@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h1>{{ __('All Products') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    {{-- <form action="{{ route('product.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Quantity</label>
                          <input type="number" name="quantity" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form> --}}

                    <div class="col-lg-3"></div>
                    <a href="{{ url('/') }}" class="btn btn-success float-end">Add Product <i class="las la-plus"></i></a>
                            <div class="cl-lg-6">
                                <table class="table table-hover" style="border-style:solid; border-color: black;">
                                    <thead>
                                      <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <a href="{{ url('/product/edit/'.$item->id) }}" type="button" class="btn btn-success"> <i class="las la-pen"></i> </a>
                                                <a href="{{ url('/product/delete/'.$item->id) }}" type="button" class="btn btn-danger"> <i class="las la-trash"></i> </a>
                                            </td>
                                            {{-- <td type="button" class="btn btn-success"> <i class="las la-pen"></i> </td> --}}
                                            {{-- <td type="button" class="btn btn-danger"> <i class="las la-trash"></i> </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
