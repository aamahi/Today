<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Brand extends Controller
{
    public function index(){
        return view('admin.content.brand');
    }
    public function add_brand(Request $request){
        return $request;
    }
}

