<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function home(){
        $brands = Brand::select('brand_logo')->orderBy('id','DESC')->get();
        return view("frontend.content.home",compact('brands'));
    }

}
