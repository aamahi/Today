<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Model\Category\Category;
use App\Model\Category\HeadCategory;
use App\Model\Product;
use App\Model\Product_photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
   public  function __construct()
   {
       $this->middleware('auth:admin');
   }
   public function index(){
       $head_categories = HeadCategory::select('id','head_category_name')->get();
       return view('admin.content.add_product',compact('head_categories'));
   }

    public function category($id)
    {
        $categories = DB::table("categories")->where("sub_category_id",$id)->pluck("category_name","id");
        return json_encode($categories);
    }

    public function add_product(productRequest $request){

       $photo = $request->file('photo');
       $photo_extension = $photo->getClientOriginalExtension();
       $photo_name = "product_image".date('y_mdhi_s').rand(1,9).".".$photo_extension;

       $product = [];
       $product['head_category_id'] = $request->head_category_id;
       $product['sub_category_id'] = $request->state;
       $product['category_id'] = $request->category;
       $product['product_name'] = $request->product_name;
       $product['details'] = $request->details;
       $product['price'] = $request->price;
       $product['discount_price'] = $request->discount_price;
       $product['quantity'] = $request->quantity;
       $product['today_offer'] = $request->today_offer;
       $product['special_offer'] = $request->special_offer;
       $product['hot_deal'] = $request->hot_deal;
       $product['photo'] = $photo_name;
       $product['created_at'] = Carbon::now();

       $upload_location = base_path('public/upload/product/'.$photo_name);
       Image::make($photo)->resize('917','1000')->save($upload_location);
       $add_product_id = Product::insertGetId($product);

       if ($request->file('multiple_image')){
           foreach ($request->file('multiple_image') as $product_photos){
               $photo_extension = $product_photos->getClientOriginalExtension();
               $product_photo_name = "product_photo".date('y_mdhi_s').rand(1,9).".".$photo_extension;
               $upload_location = base_path('public/upload/product_photo/'.$product_photo_name );
               Image::make($product_photos)->resize('917','1000')->save($upload_location);
               $multi_photo =[];
               $multi_photo['product_id']=$add_product_id;
               $multi_photo['product_photo']=$product_photo_name;
               Product_photo::insert($multi_photo);
           }
       }
        $notification = array(
            'message' => "Product Added Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('admin.product_show')->with($notification);
    }


    public function product_show(){
       $products = Product::with('category')->select('id','product_name','photo','category_id','price','quantity')->orderBy('id','DESC')->get();
       Return view('admin.content.product',compact('products'));
    }

    public function product_soft_delete($id){
        Product::find($id)->delete();
        $notification = array(
            'message' => "Product Temporary Deleted",
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function restore_deleted_product($id){
       Product::onlyTrashed()->find($id)->restore();
        $notification = array(
            'message' => "Product Restored",
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function show_deleted_product(){
       $products = Product::onlyTrashed()->get();
        return view('admin.content.deleted_product',compact('products'));
    }
    public function delete_deleted_product($id){
       $old_pic = Product::onlyTrashed()->find($id);
       unlink('upload/product/'.$old_pic->photo);
       $multi_photo = Product_photo::where('product_id',$id)->get();
        foreach ($multi_photo as $item) {
            if($item->product_photo){
                unlink('upload/product_photo/'.$item->product_photo);
            }
            Product_photo::find($item->id)->delete();
        }

        $old_pic->forceDelete();

        $notification = array(
            'message' => "Product Deleted",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }

    public function view_product($id){
       $product = Product::with('category','sub_category','head_category')->find($id);
       $categories = Category::select('category_name')->get();
       $multi_photo = Product_photo::select('product_photo')->where('product_id',$id)->get();
        return view('admin.content.view_product',compact('product','categories','multi_photo'));
    }

    public function edit_product($id){
       $products = Product::find($id);
       return view('admin.content.edit_product',compact('products'));
    }


}
