<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category\Category;
use App\Model\Category\HeadCategory;
use App\Model\Category\SubCategory;
use App\Model\Product;
use App\Model\Product_photo;
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
        $products = Product::where('sub_category_id',$id)->paginate(15);
        $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
        $brands = Brand::select('brand_logo')->orderBy('id','DESC')->get();
        return view('frontend.content.subcategory_product',compact('web_banner','head_categories','brands','products'));
    }
    public function view_product($id){
        $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
        $product = Product::find($id);
        $product_photo = Product_photo::where('product_id',$id)->get();
        $category_id = Product::find($id)->category_id;
        $related_product = Product::where('category_id',$category_id)->where('id','!=',$id)->get();
        return view('frontend.content.product_view',compact('product','product_photo','head_categories','related_product'));
    }
    public function today(){
//        $web_banner = HeadCategory::where('id',$head_category_id)->first();
        $products = Product::where('today_offer',1)->paginate(6);
        $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
        $brands = Brand::select('brand_logo')->orderBy('id','DESC')->get();
        return view('frontend.content.today',compact('head_categories','brands','products'));
    }
}
