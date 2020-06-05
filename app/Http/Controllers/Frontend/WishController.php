<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        $user_id = Auth::user()->id;
        $data=[];
        $data['user_id']=$user_id;
        $data['product_id']=$id;
        $data['ipaddress']= request()->ip();
        if(Auth::check()){
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
                'error'=>"Please Login !"
            ]);
        }

    }

}
