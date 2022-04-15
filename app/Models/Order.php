<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_detail;
class Order extends Model
{
     protected $guarded = [];
     public function users()
     {
          return $this->belongsTo(User::class, 'id_user', 'id');
     }
     public function order_details()
     {
          return $this->hasMany(Order_detail::class, 'id_order', 'id');
     }
}
