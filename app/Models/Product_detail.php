<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Wishlist;
use App\Models\Attr;
use App\Models\Product;
use App\Models\Order_detail;

class Product_detail extends Model
{
	protected $guarded = [];

	public function attrs()
	{
		return $this->belongsTo(Attr::class, 'id_attr');
	}
	public function products()
	{
		return $this->belongsTo(Product::class, 'id_product','id');
	}
	public function wishlists()
	{
		return $this->hasMany(Wishlist::class, 'id_product_detail', 'id');
	}
	public function order_details()
	{
		return $this->hasMany(Order_detail::class, 'id_pro_detail', 'id');
	}
}
