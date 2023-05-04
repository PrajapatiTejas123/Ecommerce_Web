<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function indexuser(Request $request){

        $product = Product::latest()->paginate(4);
        return view('welcome',compact('product'));
    
    }
    
    

}
