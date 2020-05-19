<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeadCategory extends Model
{
    use SoftDeletes;
    public function sub_categories(){
        return $this->hasMany(SubCategory::class,'head_category_id','id');
    }
}
