<?php

namespace App\Model;

use App\Model\Category\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
