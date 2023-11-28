@extends('layouts.app')
@section('content')


{{-- <!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>

        </style>
    </head> --}}
    {{-- <body class="antialiased"> --}}

        {{-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen  bg-center selection:text-white"> --}}
            @if (Route::has('login'))
                {{-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> --}}
                    @auth
                    <section>
                        <a href="{{ url('/home') }}" class="btn btn-success float-end">Add Product <i class="las la-plus"></i></a>

                        <div class="col-lg-3"></div>
                            <div class="cl-lg-6">
                                <table class="table table-hover" style="border-style:solid; border-color: black;">
                                    <thead>
                                      <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                        <tr>
                                            {{-- <th scope="row">1</th> --}}
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <div class="col-lg-3"></div>
                    </section>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                {{-- </div> --}}
            @endif


        {{-- </div> --}}



@endsection

    {{-- </body>
</html> --}}
