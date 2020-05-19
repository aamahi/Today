<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    public function head_category(){
        return $this->hasOne(HeadCategory::class,'id','head_category_id');
    }
}

