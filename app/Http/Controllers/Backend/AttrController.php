<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attr;
class AttrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attr= Attr::orderby('created_at','desc')->get();
        return view('backend.attr.index',compact('attr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'value' => 'required|unique:attrs'
        ],[
            'value.required' =>'Giá trị không được bỏ trống',
            'value.unique' =>'Giá trị đã tồn tại',
        ]);
        Attr::create($request->all());
        return redirect()->route('attr.index')->with('success','Thêm mới thành công');;
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
        $attr=Attr::all();
        $attr_id= Attr::find($id);
        return view('backend.attr.edit',compact('attr','attr_id'));
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
         $request->validate([
            'value' => 'required|unique:attrs'
        ],[
            'value.required' =>'Giá trị không được bỏ trống',
            'value.unique' =>'Giá trị đã tồn tại',
        ]);
        $attr= Attr::find($id);
        // dd($attr);
        $attr->update($request->all());
         return redirect()->route('attr.index')->with('success','Cập nhật thành công');

  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attr_id=Attr::find($id);
        // $attr_id->delete();
        // return redirect()->route('attr.index');
        if($attr_id->product_details->count()>0){
            return redirect()->back()->with('error','Không thể xóa');
            }
            else{
                $attr_id->delete();
            return redirect()->back()->with('success','Xóa thành công');
        }
    }
}
