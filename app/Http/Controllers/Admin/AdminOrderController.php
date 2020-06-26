<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function allOrder(){
        $all_order  = Order::all();
        return view('admin.content.allOrder',compact('all_order'));
    }
}
