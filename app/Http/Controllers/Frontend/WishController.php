<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Wish;
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
//        $data = array([
//            'user_id'=>1,
//            'product_id'=>$id,
//            'ipaddress'=>"55555",
//        ]);
        $data=[];
        $data['user_id']=$user_id;
        $data['product_id']=$id;
        $data['ipaddress']=$id;
        Wish::insert($data);
        return response()->json($data);
//        DB::table('wishes')->insert($data);
//        if (Auth::check()){
//
//        }else{
//            $notification = array(
//                'message' => "Please login",
//                'alert-type' => 'error'
//            );
//            return redirect()->back()->with($notification);
//
//        }
    }

}
