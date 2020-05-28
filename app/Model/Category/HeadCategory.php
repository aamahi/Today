<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;

class HeadCategory extends Model
{

    public function sub_categories(){
        return $this->hasMany(SubCategory::class,'head_category_id','id');
    }
//    public function categories(){
//        return $this->hasMany(Category::class,'sub_category_id','id');
//    }
}
