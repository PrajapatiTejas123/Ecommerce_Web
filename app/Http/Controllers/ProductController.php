<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Productwishlist;
use Auth;

class ProductController extends Controller
{
   public function indexuser(){
        $product = Product::where('status',0)->limit(4)->latest()->get();
        return view('welcome',compact('product'));
   }

    public function index() {
        $product = Product::all();
        $product = Product::latest()->paginate(3);
        return view('product.listproduct',compact('product'));
    }

    public function addproduct() {
        $category = Category::where('status',0)->get();
        return view('product.addproduct',compact('category'));
    }

    public function store(Request $request) { 
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'sku' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048|dimensions:width=1200,height=1486',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'category_id' => 'required',
            'discount' => 'required|numeric',
            'color' => 'required|regex:/^[a-zA-Z]+$/u',
            'status' => 'required',
        ],
        [
            'title.required'=>'Please Enter Title Name',
            'description.required'=>'Please Enter Description',
            'sku.required'=>'Please Enter Model Number',
            'image.required'=>'Please Select Image',
            'image.dimensions'=>'Please Select Valid Size Image',
            'image.mimes'=>'Please Select Png,Jpg And Jpeg Image',
            'price.required'=>'Please Enter Price',
            'price.numeric'=>'Please Enter Number Only',
            'qty.required'=>'Please Enter Quantity', 
            'qty.numeric'=>'Please Enter Number Only',
            'category_id.required'=>'Please Select Category',
            'discount.required'=>'Please Enter Discount',
            'discount.numeric'=>'Please Enter Number Only',
            'color.required'=>'Please Enter Color',
            'color.regex'=>'Please Enter String Only',
            'status.required'=>'Please Select Status',
        ]);
            $product = new Product;
            $product->title = $request->title;
            $product->description = $request->description;
            $product->sku = $request->sku;
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $product->image = $imageName;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->category_id = $request->category_id;
            $product->discount = $request->discount;
            $product->color = $request->color;
            $product->status = $request->status;
            $product->created_by = Auth::user()->id;
            $product->save();
            return redirect()->route('product/list')->with('success','Product Added Successfully.');
    }

    public function edit($id){
        $product = Product::find($id);
        $category = Category::where('status',0)->get();
        return view('product.editproduct',compact('product','category'));
    }

    public function update($id,Request $request){
        $product = Product::find($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'category_id' => 'required',
            'discount' => 'required|numeric',
            'color' => 'required|regex:/^[a-zA-Z]+$/u',
            'status' => 'required',
        ],
        [
            'title.required'=>'Please Enter Title Name',
            'description.required'=>'Please Enter Description',
            'sku.required'=>'Please Enter Model Number',
            'price.required'=>'Please Enter Price',
            'price.numeric'=>'Please Enter Number Only',
            'qty.required'=>'Please Enter Quantity',
            'qty.numeric'=>'Please Enter Number Only',
            'category_id.required'=>'Please Select Category',
            'discount.required'=>'Please Enter Discount',
            'discount.numeric'=>'Please Enter Number Only',
            'color.required'=>'Please Enter Color',
            'color.regex'=>'Please Enter String Only',
            'status.required'=>'Please Select Status',
        ]);
            $product->title = $request->title;
            $product->description = $request->description;
            $product->sku = $request->sku;
            if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $product->image = $imageName;
            }
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->category_id = $request->category_id;
            $product->discount = $request->discount;
            $product->color = $request->color;
            $product->status = $request->status;
            $product->created_by = Auth::user()->id;
            $product->save();
            return redirect()->route('product/list')->with('success','Product Update Successfully.'); 

    }

    public function destroy($id){
        $product = Product::find($id)->delete();
        return redirect()->back()->with('success','Product delete Successfully.');

    }


    // public function myfavourite()
    // {
    //     $product = Product::all();
    //     return view('wishlist',compact('product'));
    // }
    public function addwishlist(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $countwishlist = Productwishlist::countwishlist($data['product_id']);

            $Productwishlist = new Productwishlist;
            if($countwishlist == 0){
                $Productwishlist->product_id = $data['product_id'];
                $Productwishlist->user_id = $data['user_id'];
                $Productwishlist->save();

                return response()->json(['action' => 'add','message' =>  'Product Added Successfully to wishlist']);
            }else{
                Productwishlist::where(['user_id' => Auth::user()->id, 'product_id' => $data['product_id']])->delete();
                return response()->json(['action' => 'remove','message' =>  'Product Removed Successfully from wishlist']);
            }
        }
    }

    public function productdetails(Request $request,$id){
        $productdetails = Product::find($id);
        $html = view('user-lte.prodetailsprepared',compact('productdetails'))->render();
        return response()->json([
                    'html' => $html,
                    'success' => true,
                ]);
    }
}
