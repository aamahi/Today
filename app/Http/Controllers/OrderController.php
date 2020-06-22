<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Model\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function add_order(OrderRequest $request){
//        return$request->all();
//        die();
        $order =[];
        $order['user_id'] = Auth::user()->id;
        $order['name'] = $request->name;
        $order['phone'] = $request->phone;
        $order['email'] = $request->email;
        $order['city'] = $request->city;
        $order['address'] = $request->address;
        $order['payment'] = $request->payment;
        $order['sub_total'] = $request->sub_total;
        $order['total'] = $request->total;
        $order['created_at'] = Carbon::now();
        $orderId = Order::insertGetId($order);
        $notification = array(
            'message' => "Order Done !",
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
