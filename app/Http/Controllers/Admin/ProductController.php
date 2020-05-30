<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category\HeadCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
   public  function __construct()
   {
       $this->middleware('auth:admin');
   }
   public function index(){
       $head_categories = HeadCategory::select('id','head_category_name')->get();
       return view('admin.content.add_product',compact('head_categories'));
   }

    public function category($id)
    {
        $categories = DB::table("categories")->where("sub_category_id",$id)->pluck("category_name","id");
        return json_encode($categories);
    }

}
