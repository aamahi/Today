<?php

namespace App\Http\Controllers;

use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderList;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment"
        ]);


        //after payment
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
        
    }
}
