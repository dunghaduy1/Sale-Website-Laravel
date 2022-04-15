<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_detail;
use App\Models\Img_pro;
use App\Models\Banner;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Attr;

use Illuminate\Http\Request;

class BlogController extends Controller {
	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index() {
        $blog=Blog::where('status','=','1')->orderby('created_at','desc')->paginate(4);
		return view('frontend.pages.blog',compact('blog'));
	}
	public function loc_data(Request $req){
		$page= $req->number?$req->number:6;
		return redirect()->route('blog');
	}
	public function danh_muc($slug){
		$category=Category::where([['status','=','1'],['type','=','0']])->orderby('name')->get();
		$category_id=Category::where('slug','=',$slug)->first();
		$blog=Blog::where([['status','=','1'],['id_cate','=',$category_id->id]])->orderby('created_at','desc')->paginate(6);
		return view('frontend.pages.danh_muc_blog',compact('blog','slug'));
	}
	public function blog_detail($slug, $id){
		$blog=Blog::where('slug','=',$slug)->first();
		$blog_detail=Blog::find($id);
		return view('frontend.pages.blog_detail',compact('blog','slug','blog_detail'));
	}
}
