<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_detail;
class CartController extends Controller
{
	public function index() {
		return view('frontend.pages.cart');
	}

	public function add(Request $req,$id_detail) {
		$qty = $req->qty?$req->qty:1;
		$product_detail=Product_detail::find($id_detail);
		$price=$product_detail->discount>0 ? $product_detail->price-($product_detail->price*$product_detail->discount/100) : $product_detail->price;
		\Cart::add([
			'id' =>$id_detail,
			'name' => $product_detail->products->name,
			'slug' => $product_detail->products->slug,
			'image' =>$product_detail->products->image,
			'qty' => $qty,
			'price' => $price,
			'discount' => $product_detail->discount,
			'weight' => 0,
			'options' => ['size' => $product_detail->attrs->value]
		])->associate('Product_detail');
		return redirect()->route('cart')->with('success','Thêm mới thành công');
	}
	public function remove($rowId) {
		$carts=\Cart::remove($rowId);
		return redirect()->back()->with('success','Xóa item thành công');
	}
	public function update(Request $req, $rowId) {
		$qty=$req->qty>0?$req->qty:1;
		\Cart::update($rowId, $qty);
		return redirect()->back()->with('success','Cập nhật item thành công');
	}
	public function destroy() {
		\Cart::destroy();
		return redirect()->back()->with('success','Xoá tất cả item thành công');
	}
}
