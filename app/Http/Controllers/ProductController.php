<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $data['results'] =Product::with('categories')->where('status',1)->orderBy('id','DESC')->paginate(10);

        return view('product.index',$data);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name' =>'required',
                'category' =>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $image="";

            if($request->hasFile('image'))
            {
                $file=$request->file('image');
                $image = 'Product_'.time().'.'.$file->extension();
                $file->storeAs('public/products',$image);
            }

            $ins_arr=[
                'product_name' =>$validated['name'],
                'category_id' =>$validated['category'],
                'created_by' =>auth()->user()->id,
                'image' =>$image
            ];

            Product::create($ins_arr);

            return redirect()->route('products')->with('success','Product added successfully');
        }
        $data['categories'] =categories::where('status',1)->get();
        return view('product.add',$data);
    }

    public function edit(Request $request,$id)
    {
        $product_id =decrypt($id);

        $editdata=Product::find($product_id);

        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name' =>'required',
                'category' =>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $editdata->product_name = $validated['name'];
            $editdata->category_id = $validated['category'];

            if($request->hasFile('image'))
            {
                $file=$request->file('image');
                $image = 'Product_'.time().'.'.$file->extension();
                $file->storeAs('public/products',$image);

                $editdata->image = $image;
            }

            $editdata->save();

            return redirect()->route('products')->with('success','Product updated successfully');
        }

        $data['categories'] =categories::where('status',1)->get();
        $data['edit_data'] =$editdata;
        return view('product.edit',$data);
    }

    public function delete($id)
    {
        $product_id = decrypt($id);

        $editdata= Product::find($product_id);

        $editdata->status =2;
        $editdata->save();

        return redirect()->route('products')->with('success','Product deleted successfully');
    }
}
