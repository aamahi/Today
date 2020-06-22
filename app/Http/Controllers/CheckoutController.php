<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Category\HeadCategory;
use App\Model\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $sub_total = $request->sub_total;
        $ip_address = \request()->ip();
        $carts = Cart::with('product')->where('ip_address',$ip_address)->select('id','product_id','qunt')->orderBy('id','desc')->paginate(5);
        $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
        return view('frontend.content.checkout',compact('carts','head_categories','sub_total'));
    }
}
