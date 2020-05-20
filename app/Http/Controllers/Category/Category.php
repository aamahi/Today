<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
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
}
