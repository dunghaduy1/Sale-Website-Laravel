<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
class Order_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $order=Order::find($id);
        $order_details=Order_detail::where('id_order','=',$id)->get();
        return view('backend.order_detail.index',compact('order','order_details'));
    }
    public function update(Request $request, $id)
    {
        $order=Order::find($id);
		$order->update([
			'status'=>$request->status,
		]);
	return redirect()->route('order_backend')->with('success','Cập nhật thành công');
    }

}
