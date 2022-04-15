<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product_detail;

class Wishlist extends Model
{
    protected $guarded = [];
    public function product_details()
    {
        return $this->belongsTo(Product_detail::class, 'id_product_detail', 'id');
    }
}
