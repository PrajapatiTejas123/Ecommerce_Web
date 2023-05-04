<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddToCart;
use App\Models\Product;
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
                //echo "<pre>"; print_r($user->user_id); exit;
                $user->product_id = $id;
                $user->quantity = 1;
                $user->created_by = Auth::user()->id;
                $user->save();
                // return redirect()->route('product')->with('success','Product Added Successfully.'); 
            return response()->json([
                    'success' => true,
                    'data'    => $user,
                ]);
            } 
        }else{
            echo "Not Ok";
        }
    }
}
