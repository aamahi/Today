<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategory extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function home(){
        $sub_categories = \App\Model\Category\SubCategory::with('head_category')->select('id','head_category_id','sub_category_name')->get();
        $head_categories = \App\Model\Category\HeadCategory::select('id','head_category_name')->get();
        return view('admin.content.sub_category',compact('head_categories','sub_categories'));
    }
    public function add_sub_category(Request $request){
        $this->validate($request,[
            'head_category_id'=>'required',
            'sub_category_name'=>'required',
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
    public function delete_sub_category($id){
        $sub_category = \App\Model\Category\SubCategory::find($id)->delete();
        $notification = array(
            'message' => "Sub-Category Deleted",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
