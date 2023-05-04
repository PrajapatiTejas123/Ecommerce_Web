<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\AddToCart;
use Auth;
use Illuminate\Support\Facades\DB;


class FrontController extends Controller
{
    public function index(Request $request,Product $products) {
        //echo "<pre>"; print_r($request->all()); exit;
        $products = $products->newQuery();

        if ($request->search != null) {
            $products->where(function($query) use ($request) {
             $query
                ->where( 'title', 'LIKE', "%{$request->search}%" )
                ->orWhere ( 'description', 'LIKE', "%{$request->search}%" );
            });
        }
        if ($request->category != null) {
            $products->where('category_id',$request->category);
        }
       
        if ($request->categorys != null) {
            $products->whereIn('category_id',$request->categorys)->get();
        }

        if ($request->color != null) {
            $products->whereIn('color',$request->color)->get();
        }

        //echo "<pre>"; print_r(get_class_methods($products)); exit;
        $category = Category::all();

        $color = DB::table('products')
                 ->select('color', DB::raw('count(*) as total'))
                 ->groupBy('color')
                 ->get();

        if(isset($request->price)){
        $array = explode('-', $request->price);
        $minPrice = (int)$array[0];
        $maxPrice = (int)$array[1];
        $products = $products->where('price', '>=', $minPrice)
                    ->where('price','<=', $maxPrice)
                    ->where('deleted_at', NULL);
        }

        if ($request->sortby != null) {
            //echo "<pre>"; print_r($request->sortby); exit;
            $sortby = $request->sortby;
            $products = $products->orderBy('price', $sortby); 
        }

        $user = auth()->user();
        if ($user !== null) {
            $productschecked = AddToCart::where('user_id', $user->id)->pluck('product_id')->toArray();
            $products = $products->latest()->paginate();
        return view('user-lte.product',compact('category','products','color','productschecked'));
            }
            //$productsshow = Product::get();
        $products = $products->latest()->paginate();
        return view('user-lte.product',compact('category','products','color'));
    }

    
   
}
