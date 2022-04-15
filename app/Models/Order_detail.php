<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product_detail;

class Order_detail extends Model
{
     protected $guarded = [];
     public function order()
     {
          return $this->belongsTo(Order::class, 'id_order', 'id');
     }
     public function product_details()
     {
          return $this->belongsTo(Product_detail::class, 'id_pro_detail', 'id');
     }
}
