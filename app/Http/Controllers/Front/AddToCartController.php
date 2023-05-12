<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddToCart;
use App\Models\Product;
use App\Models\Productwishlist;
use Auth;

class AddToCartController extends Controller
{
    public function addtocart(Request $request,$id){
        $user = auth()->user();
        if ($user) {
            $product = Product::find($id);
            $cartadded = AddToCart::where('product_id',$product->id)->where('user_id',$user->id)->first();
            //echo "<pre>"; print_r($cartadded); exit;
            if ($cartadded) {
                return response()->json([
                    'success' => false,
                    'data'    => $user,
                ]);
            }else{
                $user = new AddToCart;
                $user->user_id = Auth::user()->id;
                $user->product_id = $id;
                $user->quantity = 1;
                $price = Product::where('id',$user->product_id)->pluck('price')->first();
                $user->product_price = $price;
                $user->created_by = Auth::user()->id;
                $user->save();
                $html = view('user-lte.prepared',compact('user'))->render();
            return response()->json([
                    'success' => true,
                    'data'    => $user,
                    'html'    => $html,
                ]);
            } 
        }else{
            echo "Not Ok";
        }
    }

    public function addtofavourite(Request $request,$id){
        $user = auth()->user();
        if ($user) {
            $product = Product::find($id);
            $addwish = Productwishlist::where('product_id',$product->id)->where('user_id',$user->id)->first();
            //echo "<pre>"; print_r($addwish); exit;
            if ($addwish) {
                return response()->json([
                    'success' => false,
                    'data'    => $user,

                ]);
            }else{
                $user = new Productwishlist;
                $user->user_id = Auth::user()->id;
                //echo "<pre>"; print_r($user->user_id); exit;
                $user->product_id = $id;
                $user->created_by = Auth::user()->id;
                $user->save(); 

                $user = auth()->user();
                $addfav = 0;
                if ($user !== null) {
                    $addfav = Productwishlist::where('user_id', $user->id)->count();
                }
                return response()->json([
                    'success' => true,
                    'data'    => $user,
                    'totalfav' => $addfav,
                ]);
            } 
        }else{
            echo "Not Ok";
        }
    }
}
