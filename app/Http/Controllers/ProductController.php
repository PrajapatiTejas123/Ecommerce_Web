<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;

class ProductController extends Controller
{

    public function index() {
        $product = Product::all();
        $product = Product::latest()->paginate(2);
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
            'image' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'category_id' => 'required',
            'discount' => 'required',
            'color' => 'required',
            'status' => 'required',
        ],
        [
            'title.required'=>'Please Enter Title Name',
            'description.required'=>'Please Enter Description',
            'sku.required'=>'Please Enter Model Number',
            'image.required'=>'Please Select Image',
            'price.required'=>'Please Enter Price',
            'qty.required'=>'Please Enter Quantity',
            'category_id.required'=>'Please Select Category',
            'discount.required'=>'Please Enter Discount',
            'color.required'=>'Please Enter Color',
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
            return redirect()->route('list')->with('success','Product Added Successfully.'); 
    }
}
