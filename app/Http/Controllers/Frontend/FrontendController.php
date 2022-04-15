<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_detail;
use App\Models\Img_pro;
use App\Models\Banner;
use App\Models\Attr;
use App\Models\Blog;
use App\Models\Admin;
use App\Models\Config;
use App\Models\Order;
use App\Models\Order_detail;
use Auth;


use Illuminate\Http\Request;
class FrontendController extends Controller {
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index() {
		$banner=Banner::where('status','=','1')->orderby('created_at','desc')->get();
		$product_mix=Product::where([['status','=','1'],['featured','=','1'],['id_cate','=','2']])->orderby('created_at','desc')->limit(5)->get();
		$product_moc=Product::where([['status','=','1'],['featured','=','1'],['id_cate','=','3']])->orderby('created_at','desc')->limit(5)->get();
		// dd($product_moc);
		foreach ($product_mix as $key=> $product) {
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
		foreach ($product_moc as $key=> $product) {
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
		$blog=Blog::where('status','=','1')->orderby('created_at','desc')->limit(5)->get();
		// dd($blog);
		return view('frontend.pages.home',compact('product_mix','product_moc','banner','blog'));
	}
	public function contact(){
		return view('frontend.pages.contact');
	}
}
