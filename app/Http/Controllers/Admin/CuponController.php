<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Cupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $cupons = Cupon::all();
        return view('admin.content.cupon',compact('cupons'));
    }
    public function add_cupon(Request $request){
        $validation_rule =[
            'cupon_name'=>'required',
            'discount'=>'required|max:99|min:1',
            'expaire_date'=>'required',
        ];
        $this->validate($request,$validation_rule);
        $cupon=[];
        $cupon['cupon_name'] = strtoupper($request->cupon_name);
        $cupon['discount'] =$request->discount;
        $cupon['expaire_date'] =$request->expaire_date;
//        print_r($cupon);
        $cupon['created_at'] =Carbon::now();
        Cupon::insert($cupon);
        $notification = array(
            'message' => "Cupon Added Successfully",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function delete_cupon($id){
        Cupon::find($id)->delete();
        $notification = array(
            'message' => "Cupon Deleted Successfully",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
