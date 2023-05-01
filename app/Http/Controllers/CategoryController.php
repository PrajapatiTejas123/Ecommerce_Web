<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        $category = Category::latest()->paginate(2);
        return view('category.listcategory',compact('category'));
    }

    public function addcategory() {
        return view('category.addcategory');
    }

    public function store(Request $request) { 
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ],
        [
            'name.required'=>'Please Enter Category Name',
            'status.required'=>'Please Select Status'
        ]);
            $category = new Category;
            $category->name = $request->name;
            $category->status = $request->status;
            $category->created_by = Auth::user()->id;
            $category->save();
            return redirect()->route('list')->with('success','Category Added Successfully.'); 
    }

    public function edit($id){
        $category=Category::find($id); 
        return view('category.editcategory',compact('category'));
    }

    public function update(Request $request,$id) { 
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ],
        [
            'name.required'=>'Please Enter Category Name',
            'status.required'=>'Please Select Status'
        ]);
        $category = Category::find($id);
            $category->name = $request->name;
            $category->status = $request->status;
            $category->created_by = Auth::user()->id;
        $category->save();
            return redirect()->route('list')->with('success','Category Update Successfully.'); 
    }

    public function destroy($id){
        $category=Category::find($id);  
        $category->delete();
        return redirect()->route('list')->with('success', 'Category Deleted Successfully.');
    }
}
