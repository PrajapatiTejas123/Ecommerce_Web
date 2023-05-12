<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Front\AddToCartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
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

// Admin Side Routes
Route::prefix('admin')->group(function(){

    Route::get('/login',[Controller::class,'adminlogin'])->name('admin.login');
    Route::get('dashboard',[Controller::class,'dashboard'])->middleware('admin','auth')->name('dashboard');

    // Category Routes
    Route::get('category/add',[CategoryController::class,'addcategory'])->name('add')->middleware('auth');
    Route::post('category/insertcategory',[CategoryController::class,'store'])->name('insertcategory')->middleware('auth');
    Route::get('category/list',[CategoryController::class,'index'])->name('list')->middleware('auth');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('edit')->middleware('auth');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('update')->middleware('auth');
    Route::post('category/delete/{id}',[CategoryController::class,'destroy'])->name('delete')->middleware('auth');

    //Product Routes
    Route::get('product/add',[ProductController::class,'addproduct'])->name('product/add')->middleware('auth');
    Route::post('product/insertproduct',[ProductController::class,'store'])->name('insertproduct')->middleware('auth');
    Route::get('product/list',[ProductController::class,'index'])->name('product/list')->middleware('auth');
    Route::get('product/editproduct/{id}',[ProductController::class,'edit'])->name('editproduct')->middleware('auth');
    Route::post('product/update/{id}',[ProductController::class,'update'])->name('updateproduct')->middleware('auth');
    Route::post('product/delete/{id}',[ProductController::class,'destroy'])->name('product/delete')->middleware('auth');

    //userroute
    Route::get('user/add',[UserController::class,'adduser'])->name('add')->middleware('admin','auth');
    Route::post('user/insertuser',[UserController::class,'store'])->name('insertuser')->middleware('admin','auth');
    Route::get('user/list',[UserController::class,'show'])->name('user/list')->middleware('auth');
    Route::get('user/edit/{id}',[UserController::class,'edituser'])->name('edituser')->middleware('auth');
    Route::post('user/update/{id}',[UserController::class,'updateuser'])->name('updateuser')->middleware('auth');
    Route::post('user/delete/{id}',[UserController::class,'destroy'])->name('user/delete')->middleware('auth');
});

//User Side Routes
// Route::prefix('user')->group(function(){
    Route::get('product',[FrontController::class,'index'])->name('product');
    Route::post('/addtocart/{id}',[AddToCartController::class,'addtocart'])->name('addtocart');
    Route::post('/addtofavourite/{id}',[AddToCartController::class,'addtofavourite'])->name('addtofavourite');
    Route::post('getProductCount',[HomeController::class,'getProductCount'])->name('getProductCount');
    Route::post('getfavcount',[HomeController::class,'getfavcount'])->name('getfavcount');
    Route::post('logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/',[ProductController::class,'indexuser'])->name('home');
    Route::get('viewcart',[FrontController::class,'viewcart'])->name('viewcart');
    Route::post('updatecart/{id}',[FrontController::class,'updatecart'])->name('updatecart');

// });

Auth::routes();
