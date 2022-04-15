<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
use App\Models\Category;
use App\Models\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog=Blog::orderby('created_at','desc')->get();
        return view('backend.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::where('type',0)->get();
        $admin=Session::get('admin');
        return view('backend.blog.create',compact('category','admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin=Session::get('admin');
        $image= trim($request->image,url('/public/uploads/'));
        $request->validate([
            'name' => 'required|unique:blogs',
            'slug' => 'required|unique:blogs',
            'id_cate'=> 'required',
            'image' =>'required',
            'content' =>'required',
        ],[
            'name.required' =>'Tiêu đề không được bỏ trống',
            'name.unique' =>'Tiêu đề đã tồn tại',
            'slug.required' =>'slug không được bỏ trống',
            'slug.unique' =>'slug đã tồn tại',
            'id_cate.required'=>'Danh mục tin tức không được bỏ trống',
            'image.required' =>'Hình ảnh không được bỏ trống',
            'content.required' =>'Nội dung tiêu đề không được bỏ trống',
        ]);
     
        $blog= Blog::create([
            'name'=>$request->name,
            'slug'=>$request->slug,
            
            'id_cate'=>$request->id_cate,
            'id_admin'=>$admin->id,
            'image'=>$image,
            'content'=>$request->content,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_desc'=>$request->meta_desc,
            
        ]);
        
        return redirect()->route('blog.index')->with('success','Thêm mới thành công');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog=Blog::find($id);
        $category = Category::where('type',0)->get();
        // dd($img_pro);
        return view('backend.blog.edit',compact('category','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin=Session::get('admin');
        $blog=Blog::find($id);
        if ($request->image=='') {
            $image=$blog->image;
        }else{
           $image= trim($request->image,url('/public/uploads/'));
       }
        $request->validate([
            'name' => ['required',Rule::unique('blogs')->ignore($id)],
            'slug' => ['required',Rule::unique('blogs')->ignore($id)],
            'id_cate' => 'required',
            'content' =>'required'
        ],[
            'name.required' =>'Tiêu đề không được bỏ trống',
            'name.unique' =>'Tiêu đề đã tồn tại',
            'slug.required' =>'Slug không được bỏ trống',
            'slug.unique' =>'Slug đã tồn tại',
            'id_cate.required'=>'Danh mục tin tức không được bỏ trống',  
            'content.required' =>'Nội dung tiêu đề không được bỏ trống',   
        ]);
        $blog->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            
            'id_cate'=>$request->id_cate,
            'id_admin'=>$admin->id,
            'image'=>$image,
            'content'=>$request->content,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_desc'=>$request->meta_desc,
        ]);
        return redirect()->route('blog.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=blog::find($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('success','Xóa thành công');
    }
}
