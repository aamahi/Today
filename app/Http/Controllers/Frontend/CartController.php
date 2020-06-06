<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Cart;
use App\Model\Category\HeadCategory;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_cart($id)
    {

        if (Auth::check()) {
            if (1>Product::find($id)->quantity) {
                return response()->json([
                    'error' => "Product ot of stock !"
                ]);
            } else {
                $user_id = Auth::user()->id;
                $data=[];
                $data['user_id']=$user_id;
                $data['qunt']=1;
                $data['product_id']=$id;
                if(Cart::where('product_id',$id)->where('user_id',$user_id)->exists()){
                    Cart::where('product_id', $id)->where('user_id', $user_id)->increment('qunt', 1);
                    return response()->json([
                        'success' => "Another Product Add in Cart !"
                    ]);
                }else{
                    Cart::insert($data);
                    return response()->json([
                        'success'=>"Product added in Cart "
                    ]);
                }
            }


        }else{
            return response()->json([
                'error'=>"Please Login Frist !"
            ]);
        }
    }
    public function cart(){
        $brands = Brand::select('brand_logo')->orderBy('id','DESC')->get();
        $user_id = Auth::user()->id;
        $carts = Cart::with('product')->where('user_id',$user_id)->select('id','product_id','qunt')->orderBy('id','desc')->paginate(5);
        $head_categories = HeadCategory::with('sub_categories')->select('id','head_category_name','category_icon','category_banner')->get();
        return view('frontend.content.cart',compact('head_categories','carts','brands'));
    }

    public function add_cart_p(Request $request){
        $user_id = Auth::user()->id;
        $data=[];
        $data['user_id']=$user_id;
        $data['qunt']=$request->qunt;
        $data['product_id']=$request->product_id;
            if ($request->qunt>Product::find($request->product_id)->quantity) {
                $notification = array(
                    'message' => "Enough Product is not available",
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            } else {
                if(Cart::where('product_id',$request->product_id)->where('user_id',$user_id)->exists()){
                    Cart::where('product_id', $request->product_id)->where('user_id', $user_id)->increment('qunt', $request->qunt);
                    $notification = array(
                        'message' => "Another Product add in cart",
                        'alert-type' => 'info'
                    );
                    return redirect()->back()->with($notification);

                }else{
                    Cart::insert($data);
                    $notification = array(
                        'message' => "Product Add to cart",
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
            }

    }
    public function remove_cart($id){
       Cart::find($id)->delete();
        $notification = array(
            'message' => "Product Remove Successfully",
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
