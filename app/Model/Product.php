<?php

namespace App\Model;

use App\Model\Category\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
