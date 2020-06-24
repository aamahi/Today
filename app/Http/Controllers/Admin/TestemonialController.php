<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Testemonial;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestemonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $testemonials = Testemonial::all();
        return view('admin.content.testimonial',compact('testemonials'));
    }
    public function add_testimonial(Request $request){
        $validation_rule =[
            'name'=>'required',
            'company_name'=>'required',
            'review'=>'required|min:25',
            'photo'=>'required|image',
        ];
        $this->validate($request,$validation_rule);

        $photo = $request->file('photo');
        $photo_extension = $photo->getClientOriginalExtension();
        $testimonial_photo = "testimonial_photo".rand(1,99).date('hi_s').".".$photo_extension;
        $upload_location = base_path('public/upload/testimonial/'.$testimonial_photo);
        $upload_image = Image::make($photo)->resize(269,270)->save($upload_location);
        if($upload_image){
            Testemonial::insert([
                'name'=>$request->name,
                'company_name'=>$request->company_name,
                'review'=>$request->review,
                'photo'=>$testimonial_photo,
                ]
            );
            $notification = array(
                'message' => "Testimonial Added Successfully",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
