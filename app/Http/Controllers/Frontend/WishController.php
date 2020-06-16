<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Category\HeadCategory;
use App\Model\Wish;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishController extends Controller
{
//    public function __construct(){
//        $this->middleware('auth');
//    }

    public function add_wish($id){

        if(Auth::check()){
            $user_id = Auth::user()->id;
            $data=[];
            $data['user_id']=$user_id;
            $data['product_id']=$id;
            $data['ipaddress']= request()->ip();
            if(Wish::where('product_id',$id)->where('user_id',$user_id)->exists()){
                return response()->json([
                    'error'=>"Product already exits !"
                ]);
            }else{
                Wish::insert($data);
                return response()->json([
                    'success'=>"Product added in wishlist "
                ]);
            }

        }else{
            return response()->json([
                'error'=>"Please Login Frist !"
            ]);
        }

    }

    public function wishlist(){
        $user_id = Auth::user()->id;
        $carts = Cart::with('product')->where('user_id',$user_id)->select('id','product_id','qunt')->orderBy('id','desc')->paginate(5);
        $wishlists = Wish::with('product')->where('user_id',$user_id)->orWhere('ipaddress',\request()->ip())->select('id','product_id')->orderBy('id','desc')->paginate(5);
        $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
        return view('frontend.content.wishlist',compact('head_categories','wishlists','carts'));
    }
    public function remove_wishlist($id){
        Wish::findOrfail($id)->delete();
        return response()->json([
            'success'=>"Product Removed form wishlist "
        ]);
//        $notification = array(
//            'message' => "Remove Product form wishlist",
//            'alert-type' => 'warning'
//        );
//        return redirect()->back()->with($notification);
    }

    public function wish_to_cart(Request $request)
    {
        $user_id = \request()->ip();
        $product_id =  $request->product_id;
        $qunt = 1;
        $wish_to_cart = [];
        $wish_to_cart['user_id']= $user_id;
        $wish_to_cart['product_id']= $product_id;
        $wish_to_cart['qunt']= $qunt;
        if(Cart::where('product_id',$request->product_id)->where('user_id',$user_id)->exists()){
            Cart::where('product_id', $request->product_id)->where('user_id', $user_id)->increment('qunt', $qunt);
        }else{
            Cart::insert($wish_to_cart);
        }

        $wish_id =$request->id;
        Wish::find($wish_id)->delete();
        $notification = array(
            'message' => "Product add in cart",
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);


    }

}
