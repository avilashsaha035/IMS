<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//========================= Products ==============================//
Route::get('/home', [ProductController::class, 'show'])->name('product.show');              //read or view
Route::post('/product/insert', [ProductController::class, 'insert'])->name('product.insert');        //insert
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');          //edit
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');        //update
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');    //delete

