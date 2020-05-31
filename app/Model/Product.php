<?php

namespace App\Model;

use App\Model\Category\Category;
use App\Model\Category\HeadCategory;
use App\Model\Category\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function sub_category(){
        return $this->hasOne(SubCategory::class,'id','sub_category_id');
    }
    public function head_category(){
        return $this->hasOne(HeadCategory::class,'id','head_category_id');
    }
}
