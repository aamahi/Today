<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderList;
use App\Model\Product;
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
        if($request->payment ==1){
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

            foreach (Cart::where('ip_address', request()->ip())->get() as $cart) {
                OrderList::insert([
                    'user_id' => Auth::user()->id,
                    'order_id' => $orderId,
                    'product_id' => $cart->product_id,
                    'qunt' => $cart->qunt,
                ]);
                // Delete Form Cart
                Product::find($cart->product_id)->decrement('quantity', $cart->qunt);
                Cart::find($cart->id)->delete();
            }
            $notification = array(
                'message' => "Thank you ! Order Done",
                'alert-type' => 'info'
            );
            return redirect()->route('frontend_home')->with($notification);
        }else{
            $total = $request->sub_total;
            return view('stripe',compact('total'));
        }

    }
}
