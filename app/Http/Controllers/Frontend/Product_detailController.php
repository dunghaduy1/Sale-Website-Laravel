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

class Product_detailController extends Controller
{
    public function product_detail($slug, $id_detail){
		// dd(Auth::user()->id);
		$attr=Attr::all();
		$product=Product::where('slug','=',$slug)->first();
		$product_detail=Product_detail::where('id_product','=',$product->id)->get();
		$img_pro=Img_pro::where('id_product','=',$product->id)->get();
		$product_detail_id=Product_detail::find($id_detail);
		$feedback_pro=Feedback_pro::where([['id_product','=',$product->id],['status','=',1]])->orderby('created_at','desc')->get();
		$one=0;
		$two=0;
		$three=0;
		$four=0;
		$five=0;
		$star=ceil($feedback_pro->avg('star'));
		$count_star=$feedback_pro->count();
		// dd($star);
		foreach ($feedback_pro as $key => $value){
			switch ($value->star) {
				case '1':
					$one+=1;
					break;
				case '2':
					# code...
					$two+=1;
					break;
				case '3':
					# code...
					$three+=1;

					break;
				case '4':
					# code...
					$four+=1;
					break;
				default:
					# code...
					$five+=1;
					break;
			}
		}
		// dd($feedback_pro->count());
		$user=User::all();
		$product_news=Product::where([['status','=','1']])->orderby('created_at','desc')->limit(12)->get();
		// dd($product_news);
		foreach ($product_news as $key=> $item) {
			$details = isset($item->product_details)?$item->product_details:[];
			if (isset($details[0])){
				$item->setAttribute('price', $details[0]['price']);
				$item->setAttribute('discount', $details[0]['discount']);
				$item->setAttribute('id_detail', $details[0]['id']);
				$item->setAttribute('quantity', $details[0]['quantity']);
			}
			else{
				$item->setAttribute('price', '0');
				$item->setAttribute('discount', '0');
				$item->setAttribute('id_detail', '0');
				$item->setAttribute('quantity', '0');
			}
		}
		return view('frontend.pages.product_detail',compact(
			'product','product_news','product_detail','product_detail_id','img_pro','attr','feedback_pro','user',
			'one','two','three','four','five','star','count_star'
		));
	}
	public function comment(Request $req,$id,$id_user){
		Feedback_pro::create([
			'id_product'=>$id,
			'id_user'=>$id_user,
			'star'=>$req->rating,
			'content'=>$req->content,
		]);
		return redirect()->back();
	}
}
