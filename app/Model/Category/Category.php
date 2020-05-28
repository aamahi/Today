<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function head_category(){
        return $this->hasOne(HeadCategory::class,'id','head_category_id');
    }
    public function sub_category(){
        return $this->hasOne(SubCategory::class,'id','sub_category_id');
    }
}

