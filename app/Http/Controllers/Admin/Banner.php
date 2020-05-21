<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class Banner extends Controller
{
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

}
