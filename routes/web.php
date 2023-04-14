<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
    return redirect('login');
});
Route::get('/admin', function () {
    return view('admin-lte.mainadmin');
});
Route::get('admin/dashboard', function () {
    return view('dashboard');
});

Route::prefix('admin')->group(function(){

    // Category Routes
    Route::get('category/add',[CategoryController::class,'addcategory'])->name('add');
    Route::post('category/insertcategory',[CategoryController::class,'store'])->name('insertcategory');
    Route::get('category/list',[CategoryController::class,'index'])->name('list');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('edit');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('update');
    Route::post('category/delete/{id}',[CategoryController::class,'destroy'])->name('delete');

    //Product Routes
    Route::get('product/add',[ProductController::class,'addproduct'])->name('product/add');
    Route::post('product/insertproduct',[ProductController::class,'store'])->name('insertproduct');
    Route::get('product/list',[ProductController::class,'index'])->name('product/list');
    Route::post('product/delete/{id}',[ProductController::class,'destroy'])->name('product/delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
