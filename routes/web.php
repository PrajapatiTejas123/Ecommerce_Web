<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
    Route::post('category/delete/{id}',[CategoryController::class,'destroy'])->name('delete');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
