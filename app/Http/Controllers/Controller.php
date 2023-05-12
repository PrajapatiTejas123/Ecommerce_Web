<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $product = Product::count();
        $category = Category::count();
        $user = User::count();
        return view('dashboard',compact('product','user','category'));
    }

    public function admin()
    {
        return view('dashboard');
    }

    public function adminlogin()
    {
        $user = Auth::user();
        
           if (! $user) {
                return view('user-lte.userlogin');
            }else{
                return redirect()->guest('admin/dashboard');
            }
    }
}
