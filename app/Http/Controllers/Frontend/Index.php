<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Model\Brand;
use App\Model\Cart;
use App\Model\Category\HeadCategory;
use App\Model\Product;
use App\Model\Testemonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Index extends Controller
{
    public function home(){
            $testemonials = Testemonial::all();
            $ip_address = \request()->ip();
            $carts = Cart::with('product')->where('ip_address',$ip_address)->select('id','product_id','qunt')->orderBy('id','desc')->paginate(5);
            $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
            $brands = Brand::select('brand_logo')->orderBy('id','DESC')->get();
            $banners = Banner::select('web_banner')->orderBy('id','DESC')->get();
            $products = Product::select('id','product_name','photo','price','discount_price','quantity','hot_deal','special_offer','today_offer')->orderBy('id','DESC')->get();
            $special_offers = Product::select('id','product_name','photo','price','discount_price','quantity','hot_deal','special_offer','today_offer')->orderBy('id','DESC')->where('special_offer',1)->get();
            $today_offers= Product::select('id','product_name','photo','price','discount_price','quantity','hot_deal','special_offer','today_offer')->orderBy('id','DESC')->where('today_offer',1)->get();
            $hot_deals = Product::select('id','product_name','photo','price','discount_price')->orderBy('id','DESC')->where('hot_deal',1)->get();
            return view("frontend.content.home",compact('brands','head_categories','banners','products','special_offers','today_offers','carts','testemonials','hot_deals'));
    }

    public function search(Request $request){
        $this->validate($request,[
            'search'=>'required'
        ]);
        $search = $request->search;

        $hot_deals = Product::select('id','product_name','photo','price','discount_price')->orderBy('id','DESC')->where('hot_deal',1)->get();
        $testemonials = Testemonial::all();
        $ip_address = request()->ip();
        $carts = Cart::with('product')->where('ip_address',$ip_address)->select('id','product_id','qunt')->orderBy('id','desc')->paginate(5);
        $products = Product::where('product_name','LIKE',"%{$search}%")->paginate(15);
        $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
        $brands = Brand::select('brand_logo')->orderBy('id','DESC')->get();
        return view('frontend.content.search',compact('head_categories','brands','products','carts','testemonials','hot_deals'));
    }
}
