@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center text-dark"><h1 class="fw-bold">{{ __('All Products') }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}

                    <div class="col-lg-3"></div>
                        <a href="{{ url('/') }}" class="btn btn-success float-end">Add Product <i class="las la-plus"></i></a>
                            <div class="cl-lg-6">
                                <table class="table table-bordered data-table" style="border-style:solid; border-color: #000000;">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th width="100px">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($products as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->name }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-center">{{ $item->price }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('/product/edit/'.$item->id) }}" type="button" class="btn btn-success"> <i class="las la-pen"></i> </a>
                                                <a href="{{ url('/product/delete/'.$item->id) }}" type="button" class="btn btn-danger"> <i class="las la-trash"></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach --}}
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
