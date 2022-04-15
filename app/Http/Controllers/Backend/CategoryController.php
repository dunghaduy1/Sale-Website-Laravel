<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::orderby('created_at','desc')->get();

        return view('backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('backend.category.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:100',
            'slug' => 'required|unique:categories|max:100'
        ],[
            'name.required' =>'Tên danh mục không được bỏ trống',
            'name.unique' =>'Tên danh mục đã tồn tại',
            'name.max' =>'Tên danh mục không vượt quá 100 kí tự',
            'slug.required' =>'slug không được bỏ trống',
            'slug.unique' =>'slug đã tồn tại',
            'slug.max' =>'slug không vượt quá 100 kí tự'
        ]);
        Category::create($request->all());
        return redirect()->route('category.index')->with('success','Thêm mới thành công');
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

        $category=Category::all();
        $category_id=Category::find($id);
        return view('backend.category.edit',compact('category_id','category'));
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
        // dd($request);
         $request->validate([
            'name' => ['required','max:100',Rule::unique('categories')->ignore($id)],
            'slug' => ['required','max:100',Rule::unique('categories')->ignore($id)],
        ],[
            'name.required' =>'Tên danh mục không được bỏ trống',
            'name.unique' =>'Tên danh mục đã tồn tại',
            'name.max' =>'Tên danh mục không vượt quá 100 kí tự',
            'slug.required' =>'slug không được bỏ trống',
            'slug.unique' =>'slug đã tồn tại',
            'slug.max' =>'slug không vượt quá 100 kí tự'
        ]);

        $category=Category::find($id);
        $category->update($request->all());
        return redirect()->route('category.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        // dd($category->hasCate);
        if($category->products->count()>0||$category->blogs->count()>0||$category->hasCate->count()>0){
            return redirect()->back()->with('error','Không thể xóa');
            }
            else{
                $category->delete();
            return redirect()->back()->with('success','Xóa thành công');
        }
    }
}
