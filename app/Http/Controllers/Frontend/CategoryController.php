<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category\Category;
use App\Model\Category\HeadCategory;
use App\Model\Category\SubCategory;
use App\Model\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id){
        $head_category_id = Category::find($id)->head_category_id;
        $web_banner = HeadCategory::where('id',$head_category_id)->first();
        $products = Product::where('category_id',$id)->get();
        $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
        $brands = Brand::select('brand_logo')->orderBy('id','DESC')->get();
        return view('frontend.content.category',compact('web_banner','head_categories','brands','products'));
    }
    public function subcategory_product($id){
        $head_category_id = SubCategory::find($id)->head_category_id;
        $web_banner = HeadCategory::where('id',$head_category_id)->first();
        $products = Product::where('sub_category_id',$id)->get();
        $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
        $brands = Brand::select('brand_logo')->orderBy('id','DESC')->get();
        return view('frontend.content.subcategory_product',compact('web_banner','head_categories','brands','products'));
    }
}
