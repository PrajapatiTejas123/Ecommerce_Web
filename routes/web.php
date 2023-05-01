<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Front\AddToCartController;
use App\Http\Middleware\Admin;

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

// Route::get('/', function () {
//     return redirect('login');
// });
Route::get('/admin', function () {
    return view('dashboard');
});
Route::get('admin/dashboard', function () {
    return view('dashboard');
});

// Admin Side Routes
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
    Route::get('product/editproduct/{id}',[ProductController::class,'edit'])->name('editproduct');
    Route::post('product/update/{id}',[ProductController::class,'update'])->name('updateproduct');
    Route::post('product/delete/{id}',[ProductController::class,'destroy'])->name('product/delete');

    //userroute
    Route::get('user/add',[UserController::class,'adduser'])->name('add')->middleware('admin','auth');
    Route::post('user/insertuser',[UserController::class,'store'])->name('insertuser')->middleware('admin','auth');
    Route::get('user/list',[UserController::class,'show'])->name('user/list','auth');
    Route::get('user/edit/{id}',[UserController::class,'edituser'])->name('edituser')->middleware('admin');
    Route::post('user/update/{id}',[UserController::class,'updateuser'])->name('updateuser')->middleware('admin');
    Route::post('user/delete/{id}',[UserController::class,'destroy'])->name('user/delete')->middleware('admin');
});

//User Side Routes
// Route::prefix('user')->group(function(){
    Route::get('product',[FrontController::class,'index'])->name('product');
    Route::post('/addtocart',[AddToCartController::class,'addtocart'])->name('addtocart');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
