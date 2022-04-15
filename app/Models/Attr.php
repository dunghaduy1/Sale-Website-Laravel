<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product_detail;
class Attr extends Model
{
    protected $guarded=[];
  public function product_details(){
      // return $this->hasMany('App\Models\Product_detail');
		return $this->hasMany(Product_detail::class, 'id_attr', 'id');
      
    }
}
