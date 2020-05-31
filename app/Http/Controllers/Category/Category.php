<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function home(){
        $head_categories = DB::table('head_categories')->get();
        $categories = \App\Model\Category\Category::with('head_category')->with('sub_category')->select('id','head_category_id','sub_category_id','category_name')->get();
        return view('admin.content.category',compact('head_categories','categories'));
    }
    public function sub_category($id)
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
        $cat_name = $request->category_name;
        $explode = explode(' ',$cat_name);
        $slug = strtolower(join('',$explode));
        $category=[];
        $category['head_category_id'] =$request->head_category_id;
        $category['sub_category_id'] =$request->state;
        $category['category_name'] =$request->category_name;
        $category['slug'] =$slug;
//        print_r($category);
        $category['created_at'] =Carbon::now();
        \App\Model\Category\Category::insert($category);
        $notification = array(
            'message' => "Category Added Sucessfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    public function delete_category($id){
    $sub_category = \App\Model\Category\Category::find($id)->delete();
    $notification = array(
        'message' => "Category Deleted",
        'alert-type' => 'error'
    );
    return redirect()->back()->with($notification);
}

}
