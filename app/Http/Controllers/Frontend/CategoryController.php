<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category\Category;
use App\Model\Category\HeadCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id,$slug){
        $head_category_id = Category::find($id)->head_category_id;
        $web_banner = HeadCategory::where('id',$head_category_id)->first();
//        $web_banner = $head_category->web_banner;
        $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
        $brands = Brand::select('brand_logo')->orderBy('id','DESC')->get();
        return view('frontend.content.category',compact('web_banner','head_categories','brands'));
    }
}
