<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category extends Controller
{
    public function home(){
        $head_categories = DB::table('head_categories')->get();

        return view('admin.content.category',compact('head_categories'));
    }
    public function get_sub_category(Request $request){
        return $request->has(head_category_id);
//        if ($request->has(head_category_id)){
//            return DB::table('sub_categories')->where('head_category_id',$request->input('head_category_id'))->get();
//        }
    }
    public function getStates($id)
    {
        $states = DB::table("sub_categories")->where("head_category_id",$id)->pluck("sub_category_name","id");
        return json_encode($states);
    }
    public function add_cateogry(Request $request){
        $validation_rulues = [
            'head_category_id'=>'required',
            'state'=>'required',
            'category_name'=>'required',
        ];
        $this->validate($request,$validation_rulues);
        $category=[];
        $category['head_category_id'] =$request->head_category_id;
        $category['sub_category_id'] =$request->state;
        $category['category_name'] =$request->category_name;
//        print_r($category);
        $category['created_at'] =Carbon::now();
        \App\Model\Category\Category::insert($category);
        $notification = array(
            'message' => "Category Added Sucessfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

}
