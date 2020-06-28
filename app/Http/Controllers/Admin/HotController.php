<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category\HeadCategory;
use Illuminate\Http\Request;

class HotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function add_hot(){
        $head_categories = HeadCategory::select('id','head_category_name')->get();
        return view('admin.content.add_hot',compact('head_categories'));
    }
}
