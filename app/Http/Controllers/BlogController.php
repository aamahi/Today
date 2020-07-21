<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function addBlog(){
        return view('admin.content.addBlog');
    }
    public function addBlogPro(Request $request){
        echo Auth::guard('admin')->id;
//        $this->validate($request,[
//            'title'=>'required',
//            'details'=>'required',
//            'photo'=>'required',
//        ]);
//
//        return $request->all();
    }
}
