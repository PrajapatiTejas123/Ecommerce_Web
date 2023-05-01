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
            'image.dimensions'=>'Please Select Valid Size Image',
            'image.mimes'=>'Please Select Png,Jpg And Jpeg Image',
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
            'price.required'=>'Please Enter Price',
            'qty.required'=>'Please Enter Quantity',
            'category_id.required'=>'Please Select Category',
            'discount.required'=>'Please Enter Discount',
            'color.required'=>'Please Enter Color',
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

}
