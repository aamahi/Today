<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class Banner extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $banners = \App\Model\Banner::select('id','web_banner')->get();
        return view('admin.content.banner',compact('banners'));
    }
    public function add_banner(Request $request){
        $this->validate($request,[
            'web_banner'=>'required|image',
        ]);

        $banner = $request->file('web_banner');
        $banner_extension = $banner->getClientOriginalExtension();
        $web_banner = "web_banner".rand(1,99).date('hi_s').".".$banner_extension;
        $upload_location = base_path('public/upload/banner/'.$web_banner);
        $upload_image = Image::make($banner)->resize(870,370)->save($upload_location);
        if($upload_image){
            \App\Model\Banner::insert(
                ['web_banner'=>$web_banner]
            );
            $notification = array(
                'message' => "Web Banner Added Successfully",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function edit_banner($id){
        $banner = \App\Model\Banner::find($id);
        return view('admin.content.update_banner',compact('banner'));
    }
    public function update_banner(Request $request,$id){
        $this->validate($request,['web_banner'=>'required|image']);
        $old_banner = \App\Model\Banner::find($id)->web_banner;
        unlink('upload/banner/'.$old_banner);
        $new_banner = $request->file('web_banner');
        $banner_extension = $new_banner->getClientOriginalExtension();
        $web_banner = "web_banner".rand(1,99).date('hi_s').".".$banner_extension;
        $upload_location = base_path('public/upload/banner/'.$web_banner);
        $upload_image = Image::make($new_banner)->resize(870,370)->save($upload_location);
        if($upload_image){
            $update_banner = \App\Model\Banner::find($id);
            $update_banner->web_banner= $web_banner;
            $update_banner->save();

            $notification = array(
                'message' => "Web Banner Added Successfully",
                'alert-type' => 'success'
            );
            return redirect()->route('admin.banner')->with($notification);
        }
    }

    public function banner_soft_delete($id){
        $banner_soft_delete = \App\Model\Banner::find($id)->delete();
        $notification = array(
            'message' => "Web Banner Deleted Temporary",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function deleted_banner(){
        $deleted_banners = \App\Model\Banner::onlyTrashed()->get();
        return view('admin.content.deleted_banner',compact('deleted_banners'));
    }
    public function restore_banner($id){
        \App\Model\Banner::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => "Banner Restored",
            'alert-type' => 'info'
        );
        return redirect()->route('admin.banner')->with($notification);
    }

    public function banner_delete($id){
        $deleted_brand = \App\Model\Banner::onlyTrashed()->find($id);
        unlink('upload/banner/'.$deleted_brand->web_banner);
        $deleted_brand->forceDelete();
        $notification = array(
            'message' => "Banner Deleted Succcesfully !",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
