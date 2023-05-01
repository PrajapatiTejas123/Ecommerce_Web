<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\Front\HomeController;
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
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[ProductController::class,'indexuser'])->name('login');

Auth::routes();
 // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  Route::get('/userlogin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Auth::routes();

Route::get('/userlogin',function (){
    return view('user-lte.userlogin');
});


// Route::get('/admin/login', function () {
//     return view('auth.login');  
// });
   

// Route::get('/admin', function () {
//     return view('dashboard');
// });
// Route::get('admin/dashboard', function () {
//     return view('dashboard');
// });


Route::prefix('admin')->group(function(){

    Route::get('/login',[Controller::class,'adminlogin'])->name('login');
    Route::get('/',[Controller::class,'admin'])->middleware('admin','auth');
    Route::get('dashboard',[Controller::class,'dashboard'])->middleware('admin','auth');

    // Category Routes
    Route::get('category/add',[CategoryController::class,'addcategory'])->name('add')->middleware('admin');
    Route::post('category/insertcategory',[CategoryController::class,'store'])->name('insertcategory')->middleware('admin');
    Route::get('category/list',[CategoryController::class,'index'])->name('list');
    Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('edit')->middleware('admin');
    Route::post('category/update/{id}',[CategoryController::class,'update'])->name('update')->middleware('admin');
    Route::post('category/delete/{id}',[CategoryController::class,'destroy'])->name('delete')->middleware('admin');

    //Product Routes
    Route::get('product/add',[ProductController::class,'addproduct'])->name('product/add')->middleware('admin');
    Route::post('product/insertproduct',[ProductController::class,'store'])->name('insertproduct')->middleware('admin');
    Route::get('product/list',[ProductController::class,'index'])->name('product/list');
    Route::get('product/editproduct/{id}',[ProductController::class,'edit'])->name('editproduct')->middleware('admin');
    Route::post('product/update/{id}',[ProductController::class,'update'])->name('updateproduct')->middleware('admin');
    Route::post('product/delete/{id}',[ProductController::class,'destroy'])->name('product/delete')->middleware('admin');

    //userroute
    Route::get('user/add',[UserController::class,'adduser'])->name('add')->middleware('admin','auth');
    Route::post('user/insertuser',[UserController::class,'store'])->name('insertuser')->middleware('admin','auth');
    Route::get('user/list',[UserController::class,'show'])->name('user/list','auth');
    Route::get('user/edit/{id}',[UserController::class,'edituser'])->name('edituser')->middleware('admin');
    Route::post('user/update/{id}',[UserController::class,'updateuser'])->name('updateuser')->middleware('admin');
    Route::post('user/delete/{id}',[UserController::class,'destroy'])->name('user/delete')->middleware('admin');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
});
    // Route::get('favourite',[ProductController::class,'myfavourite'])->name('myfavourite');
    // Route::post('wishlist',[ProductController::class,'addwishlist'])->name('wishlist');
    Route::post('/btn-addwish-b2',[ProductController::class,'addwishlist'])->name('wishlist');


