<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HeadCategory extends Controller
{
    public function home(){
        $head_categorys = \App\Model\Category\HeadCategory::select('id','head_category_name','category_icon','category_banner')->get();;
        return view('admin.content.head_category',compact('head_categorys'));
    }
    public function add_head_category(Request $request){
        $validation_rule =[
            'head_category_name'=>'required|unique:head_categories,head_category_name',
            'category_icon'=>'required',
            'category_banner'=>'required|image',
        ];
        $this->validate($request, $validation_rule);
        $category_banner= $request->file('category_banner');
        $head_category_name= $request->head_category_name;
        $explode_head_category_name = explode(' ',$head_category_name);
        $join_head_category_name = join('',$explode_head_category_name);

        $extension=  $category_banner->getClientOriginalExtension();

        $category_banner_name = strtolower($join_head_category_name.'.'.$extension);
        $upload_location = base_path('public/upload/category/'.$category_banner_name);
        $upload_image = Image::make($category_banner)->resize(295,279)->save($upload_location);
        if ($upload_image){
            $data =[];
            $data['head_category_name'] = $request->head_category_name;
            $data['category_icon'] = $request->category_icon;
            $data['category_banner'] = $category_banner_name;
            \App\Model\Category\HeadCategory::insert($data);
            $notification = array(
                'message' => "Head Category Added Successfully",
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
