<?php

namespace App\Http\Controllers;

use App\Model\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addBlog(){
        $blogs = Blog::select('id','title','photo','created_at')->orderBy('id','DESC')->get();
        return view('admin.content.blog',compact('blogs'));
    }
    public function addBlogPro(Request $request){
//        return $request->all();
////        die();

        $this->validate($request,[
            'title'=>'required',
            'details'=>'required',
            'photo'=>'required',
        ]);


        $photo = $request->file('photo');
        $photo_exten = $photo->getClientOriginalExtension();
        $photo_name = "blog_".date('Ymd_his').rand(1,99).".".$photo_exten;
        $upload_location = base_path('public/upload/blog/'.$photo_name);
        Image::make($photo)->resize('780','443')->save($upload_location);


        $blog =[];
        $blog['title'] =$request->title;
        $blog['details'] =$request->details;
        $blog['photo'] =$photo_name;
        $blog['created_at'] =Carbon::now();
        Blog::insert($blog);

        $notification = array(
            'message' => "Blog Added Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog')->with($notification);
    }
    public function blogDelete($id){
        $blg = Blog::find($id);
        $photo = $blg->photo;
        unlink('upload/blog/'.$photo);
        $blg->delete();

        $notification = array(
            'message' => "Blog Deleted",
            'alert-type' => 'error'
        );
        return redirect()->route('admin.blog')->with($notification);
    }

    public function readBlog($id){
        $notification = array(
            'message' => "Blog system not compleate",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
//        $blog= Blog::find($id);
//        return view('admin.content.readBlog',compact('blog'));
    }
}
