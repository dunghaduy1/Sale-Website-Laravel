<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_detail;
use App\Models\Img_pro;
use App\Models\Attr;
use App\Models\Feedback_pro;
use App\User;
use Auth;
class ShopController extends Controller
{
    /**
	 * [shop description]
	 * @return [type] [description]
	 */
	public function shop(){
		$attr=Attr::all();
		$products=Product::where(['status','=','1'])->orderby('discount','desc')->paginate(9);
		foreach ($products as $key=> $product) {
			$details = isset($product->product_details)?$product->product_details:[];
			if (isset($details[0])){
				$product->setAttribute('price', $details[0]['price']);
				$product->setAttribute('discount', $details[0]['discount']);
				$product->setAttribute('id_detail', $details[0]['id']);
				$product->setAttribute('quantity', $details[0]['quantity']);
			}
			else{
				$product->setAttribute('price', '0');
				$product->setAttribute('discount', '0');
				$product->setAttribute('id_detail', '0');
				$product->setAttribute('quantity', '0');
			}
		}
		return view('frontend.pages.shop',compact('products','attr'));
	}
	/**
	 * [danh_muc description]
	 * @param  [type] $slug [description]
	 * @return [type]       [description]
	 */
	public function danh_muc($slug){
		$category_id=Category::where('slug','=',$slug)->first();
		$products=Product::where([['status','=','1'],['id_cate','=',$category_id->id]])->orderby('created_at','desc')->paginate(9);
		foreach ($products as $key=> $product) {
			$details = isset($product->product_details)?$product->product_details:[];
			if (isset($details[0])){
				$product->setAttribute('price', $details[0]['price']);
				$product->setAttribute('discount', $details[0]['discount']);
				$product->setAttribute('id_detail', $details[0]['id']);
				$product->setAttribute('quantity', $details[0]['quantity']);
			}
			else{
				$product->setAttribute('price', '0');
				$product->setAttribute('discount', '0');
				$product->setAttribute('id_detail', '0');
				$product->setAttribute('quantity', '0');
			}
		}
		return view('frontend.pages.danh_muc_shop',compact('products','slug'));
	}
	/**
	 * [shop description]
	 * @return [type] [description]
	 */
	public function shop_new(){
		$products=Product::where('status','=','1')->orderby('created_at','desc')->paginate(9);
		foreach ($products as $key=> $product) {
			$details = isset($product->product_details)?$product->product_details:[];
			if (isset($details[0])){
				$product->setAttribute('price', $details[0]['price']);
				$product->setAttribute('discount', $details[0]['discount']);
				$product->setAttribute('id_detail', $details[0]['id']);
				$product->setAttribute('quantity', $details[0]['quantity']);
			}
			else{
				$product->setAttribute('price', '0');
				$product->setAttribute('discount', '0');
				$product->setAttribute('id_detail', '0');
				$product->setAttribute('quantity', '0');
			}
		}
		return view('frontend.pages.shop_new',compact('products'));
	}
}
