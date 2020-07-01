<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Model\Category\HeadCategory;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function add_hot(){
        $head_categories = HeadCategory::select('id','head_category_name')->get();
        return view('admin.content.add_hot',compact('head_categories'));
    }
    public function product($id)
    {
        $products = DB::table("products")->where("category_id",$id)->pluck("product_name","id");
        return json_encode($products);
    }
    public function add_hot_P(Request $request){
        $validation_rule = [
            'product_name' => 'required',
            'discount_price' => 'required',
        ];
        $this->validate($request , $validation_rule);
        $id = $request->product_name;
        $add_hot = Product::find($id);
        $add_hot->discount_price= $request->discount_price;
        $add_hot->hot_deal= 1;
        $add_hot->save();
        $notification = array(
            'message' => "Product added in hot deal",
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function hot(){
        $products = Product::with('category')->select('id','product_name','photo','category_id','price','discount_price')->where('hot_deal',1)->orderBy('id','DESC')->get();
        Return view('admin.content.hot_product',compact('products'));
    }
    public function remove_hot($id){
        $remove_hot = Product::find($id);
        $remove_hot->discount_price= 0;
        $remove_hot->hot_deal= 0;
        $remove_hot->save();
        $notification = array(
            'message' => "Product remvoe in hot deal",
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

}
