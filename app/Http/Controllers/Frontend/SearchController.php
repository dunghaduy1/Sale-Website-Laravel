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
class SearchController extends Controller
{
    /**
	 * [loc_data description]
	 * @param  Request $req [description]
	 * @return [type]       [description]
	 */
	public function sort(Request $req){
		$sort=$req->sort=='p-name-za'?'desc':'asc';
		// dd($sort);
		$products=Product::where('status','=','1')->orderby('created_at',$sort)->paginate(9)->get();
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
		return view('frontend.pages.sort',compact('products'));
	}
	public function getsearch(Request $request){
		// dd($request->all());
		$products=Product::where([['name','like','%'.$request->key.'%'],['status','=','1']])
		->orderby('created_at','desc')->paginate(9);
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
		return view('frontend.pages.search',compact('products'));

	}
}
