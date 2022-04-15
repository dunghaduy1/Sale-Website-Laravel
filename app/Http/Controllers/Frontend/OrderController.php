<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
use Auth;

class OrderController extends Controller
{
    public function order(){
		$orders=Order::where([['id_user','=',Auth::user()->id],['status','!=',3]])->orderby('created_at','desc')->get();
		// $order_details=Order::where('id_order','=',$orders->id)->get();
		return view('frontend.pages.don_hang',compact('orders'));
	}
	public function history(){
		$orders=Order::where([['id_user','=',Auth::user()->id],['status','=',3]])->orderby('created_at','desc')->get();
		// $order_detail=Order::where('id_order','=',$order->id)->get();
		return view('frontend.pages.history',compact('orders'));
	}
	public function order_detail($id){
		$order=Order::find($id);
		$order_details=Order_detail::where('id_order','=',$id)->get();
		// dd($order_details);
		return view('frontend.pages.don_hang_chi_tiet',compact('order_details','order'));
	}
	public function post_order_detail(Request $request, $id){
		$order=Order::find($id);
		$order->update([
			'status'=>$request->status,
		]);
		// dd($order->status);
		if($request->status==3){
			return redirect()->route('order-history',$id)->with('success','Cập nhật đơn hàng thành công');
		}
		else{
			return redirect()->route('order-frontend',$id)->with('success','Hủy đơn hàng thành công');
		}
	}
}
