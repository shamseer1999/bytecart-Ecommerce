<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['results']=categories::where('status',1)->orderBy('id','DESC')->paginate(10);
        return view('category.index',$data);
    }

    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name' =>'required'
            ]);

            $ins_arr =[
                'category_name' =>$validated['name'],
                'created_by' =>auth()->user()->id
            ];

            categories::create($ins_arr);

            return redirect()->route('categories')->with('success','New category created successfully');
        }
        return view('category.add');
    }

    public function edit(Request $request,$id)
    {
        $cat_id=decrypt($id);

        $editdata = categories::find($cat_id);

        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'name' =>'required'
            ]);

            $editdata->category_name = $validated['name'];
            $editdata->save();

            return redirect()->route('categories')->with('success','Category updated successfully');
        }

        $data['edit_data']=$editdata;
        return view('category.edit',$data);
    }

    public function delete(Request $request,$id)
    {
        $cat_id=decrypt($id);

        $editdata = categories::find($cat_id);

        $editdata->status = 2;
        $editdata->save();

        return redirect()->route('categories')->with('success','Category deleted successfully');
    }
}
