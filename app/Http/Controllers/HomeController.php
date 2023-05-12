<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\AddToCart;
use App\Models\Productwishlist;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->roles == 0){
           // echo "<pre>"; print_r('expression'); exit;
            return view('dashboard');
        }else{
            // $product = Product::latest()->paginate(4);
            $product = Product::orderBy('id','desc')->take(4)->get();
            //echo "<pre>"; print_r($product); exit;
            return view('welcome',compact('product'));
        }
    }

    static function getProductCount(){
        //return 10;
        $user = auth()->user();
        $addcart = 0;
        if ($user !== null) {
            $addcart = AddToCart::where('user_id', $user->id)->count();
            //echo "<pre>"; print_r($html); exit;
        }
        return $addcart;
    }

    static function getfavcount(){
        $user = auth()->user();
        $addfav = 0;
        if ($user !== null) {
            $addfav = Productwishlist::where('user_id', $user->id)->count();
        }
        return $addfav;
    }

    static function getCartProduct(){
        $user = auth()->user();
        if ($user !== null) {
            $data = AddToCart::where('user_id', Auth::user()->id)->get();
            return $data;   
        }else{
            return [];
        }
         
    }
    
}
