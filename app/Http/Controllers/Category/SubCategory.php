<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategory extends Controller
{
    public function home(){
        $sub_categories = \App\Model\Category\SubCategory::all();
        $head_categories = \App\Model\Category\HeadCategory::select('id','head_category_name')->get();
        return view('admin.content.sub_category',compact('head_categories','sub_categories'));
    }
    public function add_sub_category(Request $request){
        $this->validate($request,[
            'head_category_id'=>'required',
            'sub_category_name'=>'required|unique:sub_categories,sub_category_name',
        ]);
        $data =[];
        $data['head_category_id']=$request->head_category_id;
        $data['sub_category_name']=$request->sub_category_name;
        \App\Model\Category\SubCategory::insert($data);

        $notification = array(
            'message' => "Sub Category Added",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
}
