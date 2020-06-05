<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
