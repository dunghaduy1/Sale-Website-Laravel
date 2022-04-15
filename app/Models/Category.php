<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Category;

class Category extends Model
{
   protected $guarded=[];

   public function hasCate(){
    return $this->hasMany(Category::class,'parent_id','id');
}
    public function parentCate(){
    	return $this->belongsTo(Category::class,'parent_id','id');
    }
     public function products(){
    	// return $this->hasMany(Product::class);
    	return $this->hasMany(Product::class, 'id_cate', 'id');
    }
    public function blogs(){
    	// return $this->hasMany(Product::class);
    	return $this->hasMany(Blog::class, 'id_cate', 'id');
    }
}
