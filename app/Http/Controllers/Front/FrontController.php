<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\AddToCart;
use App\Models\Productwishlist;
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
            //echo "<pre>"; print_r($products); exit;
        }

        //echo "<pre>"; print_r(get_class_methods($products)); exit;
        //$category = Category::all();
        $category = Category::where('status',0)->get();
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
        //$products->get();
        if ($request->sortby != null) {
            //echo "<pre>"; print_r($request->sortby); exit;
            $sortby = $request->sortby;
            $products = $products->orderBy('price', $sortby);
        }
        $products = $products->latest()->paginate();

        $user = auth()->user();
        if ($user !== null) {
            $productschecked = AddToCart::where('user_id', $user->id)->pluck('product_id')->toArray();
            $favcheck = Productwishlist::where('user_id', $user->id)->pluck('product_id')->toArray();
            
        //$products = Product::where('status',0)->latest()->get();
        return view('user-lte.product',compact('category','products','color','productschecked','favcheck'));
            }
        //$products = Product::where('status',0)->latest()->get();
        return view('user-lte.product',compact('category','products','color'));
    }

    public function viewcart(){
        $viewcart = AddToCart::selectRaw("*,(product_price*quantity) as cartTotal")->where('user_id', Auth::user()->id)->get();
        $total = $viewcart->map(function($item, $key) {
                           return $item->toArray()['cartTotal'];
                        });
        $grandtotal = array_sum($total->toArray());
        return view('user-lte.viewcart',compact('viewcart','grandtotal'));
    }

    public function updatecart(Request $request,$id){
         $updatequant = AddToCart::find($id);
         $updatequant->quantity = $request->quantity;
         $updatequant->save();
         $price = Product::where('id',$updatequant->product_id)->pluck('price')->first();
         $total = $updatequant->quantity * $price;
         $grandtotal = DB::table('addtocarts')->where('user_id' , $updatequant->user_id)
                        ->join('products','products.id','=','addtocarts.product_id')
                        ->selectRaw('SUM((addtocarts.quantity * products.price)) as totalPrice')
                        ->first();
         $maintotal = $grandtotal->totalPrice;
         //echo "<pre>"; print_r($maintotal); exit;
         return response()->json([
                    'success' => true,
                    'total'    =>$total,
                    'maintotal'    => $maintotal,
                ]);
    }
      
}
