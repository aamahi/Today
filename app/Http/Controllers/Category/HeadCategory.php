<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use function GuzzleHttp\Psr7\str;

class HeadCategory extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function home(){
        $head_categorys = \App\Model\Category\HeadCategory::select('id','head_category_name','category_icon','category_banner')->get();;
        return view('admin.content.head_category',compact('head_categorys'));
    }
    public function add_head_category(Request $request){
        $validation_rule =[
            'head_category_name'=>'required|unique:head_categories,head_category_name',
            'category_icon'=>'required',
            'category_banner'=>'required|image',
            'web_banner'=>'required|image',
        ];
        $this->validate($request, $validation_rule);
        $cat_name = $request->head_category_name;
        $explode = explode(' ',$cat_name);
        $slug = strtolower(join('',$explode));

        $category_banner= $request->file('category_banner');

        $head_category_name= $request->head_category_name;
        $explode_head_category_name = explode(' ',$head_category_name);
        $join_head_category_name = join('',$explode_head_category_name);

        $extension=  $category_banner->getClientOriginalExtension();

        $category_banner_name = strtolower($join_head_category_name.'.'.$extension);
        $upload_location = base_path('public/upload/category/'.$category_banner_name);
        $upload_image = Image::make($category_banner)->resize(295,279)->save($upload_location);

        if ($upload_image){
            $web_banner= $request->file('web_banner');
            $extension_web=  $web_banner->getClientOriginalExtension();
            $web_banner_name = $slug.".".$extension_web;
            $upload_location_web = base_path('public/upload/web_banner'.$web_banner_name);
            $upload_web = Image::make($web_banner)->resize(850,380)->save($upload_location_web);
            if ($upload_web){
                $data =[];
                $data['head_category_name'] = $request->head_category_name;
                $data['slug'] = $slug;
                $data['category_icon'] = $request->category_icon;
                $data['category_banner'] = $category_banner_name;
                $data['web_banner'] = $web_banner_name;
                \App\Model\Category\HeadCategory::insert($data);
                $notification = array(
                    'message' => "Head Category Added Successfully",
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'message' => "web banner upload error",
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'message' => "Somethig wrong!",
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function delete_head_category($id){
        $head_category = \App\Model\Category\HeadCategory::find($id);
        unlink('upload/category/'.$head_category->category_banner);
        $head_category->delete();
        $notification = array(
            'message' => "Category Deleted",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
