<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class Brand extends Controller
{
    public function index(){
        return view('admin.content.brand');
    }
    public function add_brand(Request $request){
        $validation_rule =[
            'brand_name'=>'required',
            'brand_logo'=>'required|image',
        ];
        $this->validate($request, $validation_rule);
        $brand_log= $request->file('brand_logo');
        $brand_name= $request->brand_name;
        $explode_brand_name = explode(' ',$brand_name);
        $join_brand_name = join('',$explode_brand_name);

        $extension=  $brand_log->getClientOriginalExtension();

        $brand_logo_name= strtolower($join_brand_name.'_'.rand(1,9).'.'.$extension);
        $upload_location = base_path('public/upload/brand/'.$brand_logo_name);
        $upload_image = Image::make($brand_log)->resize(166,110)->save($upload_location);
        if ($upload_image){
            $data =[];
            $data['brand_name'] = $request->brand_name;
            $data['brand_logo'] = $brand_logo_name;
            \App\Model\Brand::insert($data);
            $notification = array(
                'message' => "Brand Added Successfully",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => "Somethig wrong!",
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }
}

