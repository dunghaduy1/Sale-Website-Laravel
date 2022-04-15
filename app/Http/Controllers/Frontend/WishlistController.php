<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
	public function index($id_user)
	{
		$wishlist = Wishlist::where('id_user','=',$id_user)->orderby('created_at','desc')->get();
		// dd($wishlist->count());
		return view('frontend.pages.wishlist', compact('wishlist'));
	}

	public function add($id_user, $id_detail)
	{
		// dump($id_user);
		// dd($id_detail);
		$wishlist = Wishlist::where(['id_user'=>$id_user,'id_product_detail'=>$id_detail])->count();
		if(!$wishlist){
			Wishlist::create([
				'id_user' => $id_user,
				'id_product_detail' => $id_detail,
			]);
		}
		else{
			// dd('có rồi');
		}

		return redirect()->back()->with('success','Thêm mới thành công');
	}

	public function remove($id)
	{
		$wishlist=Wishlist::find($id);
		// dd($wishlist);
		$wishlist->delete();
		return redirect()->back()->with('success','Xóa sản phẩm thành công');
	}

	public function destroy($id_user)
	{
		$wishlist = Wishlist::where('id_user','=',$id_user)->get();
		foreach ($wishlist as $key => $value) {
		$value->delete();
		}
		return redirect()->back()->with('success','Xóa tất cả sản phẩm thành công');
	}
}
