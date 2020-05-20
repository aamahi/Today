<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class Brand extends Controller
{
    public function index(){
        $brands = \App\Model\Brand::select('id','brand_name','brand_logo')->get();
        return view('admin.content.brand',compact('brands'));
    }
    public function add_brand(Request $request){
        $validation_rule =[
            'brand_name'=>'required|unique:brands,brand_name',
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

    public function soft_delete($id){
        \App\Model\Brand::find($id)->delete();
        $notification = array(
            'message' => "Brand Deleted Temporary",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function deleted_brand(){
        $deleted_brand = \App\Model\Brand::onlyTrashed()->get();
        return view('admin.content.deleted_brand',compact('deleted_brand'));
    }
    public function brand_delete($id){
        $deleted_brand = \App\Model\Brand::onlyTrashed()->find($id);
        unlink('upload/brand/'.$deleted_brand->brand_logo);
        $deleted_brand->forceDelete();
        $notification = array(
            'message' => "Brand Deleted Succcesfully !",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function restore_brand($id){
        \App\Model\Brand::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => "Brand Restored",
            'alert-type' => 'info'
        );
        return redirect()->route('admin.brand')->with($notification);
    }
}

