<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_cart($id){

        if(Auth::check()){
            $user_id = Auth::user()->id;
            $data=[];
            $data['user_id']=$user_id;
            $data['product_id']=$id;
            if(Cart::where('product_id',$id)->where('user_id',$user_id)->exists()){
                Cart::where('product_id', $id)->where('user_id', $user_id)->increment('quantity', 1);

                return response()->json([
                    'success'=>"Another Product Add in Cart !"
                ]);
            }else{
                Cart::insert($data);
                return response()->json([
                    'success'=>"Product added in Cart "
                ]);
            }

        }else{
            return response()->json([
                'error'=>"Please Login Frist !"
            ]);
        }

    }
}
