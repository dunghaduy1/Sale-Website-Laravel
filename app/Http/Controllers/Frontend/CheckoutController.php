<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product_detail;
class CheckoutController extends Controller
{
    public function index(){
    return view('frontend.pages.checkout');
    }
    public function checkout(Request $request){
        // dd($request->all());
        $cart=(\Cart::content());
            $order=Order::create([
                'id_user' =>$request->id_user,
                'total_price' =>$request->total_price,
                'address_ship' =>$request->address_ship,
                'note' =>$request->note,
                'status' =>$request->status,
            ]);
            foreach ($cart as $key => $value) {
               Order_detail::create([
                'id_order'=>$order->id,
                'id_pro_detail'=>$value->id,
                'price'=>$value->price,
                'quantity'=>$value->qty,
               ]);
               $product_detail=Product_detail::find($value->id);
               $product_detail->update([
                   'quantity'=>$product_detail->quantity-$value->qty,
               ]);
            }
            \Cart::destroy();
		return redirect()->route('cart')->with('success','Đặt hàng thành công thành công');
        }
}
