<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\User;

class Feedback_pro extends Model
{
     protected $guarded=[];
     public function products() {
  		return $this->belongsTo(Product::class, 'id_product', 'id');
  	}
  	public function users() {
      return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
