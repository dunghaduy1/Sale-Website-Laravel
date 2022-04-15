<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attr;
use App\Models\Product_detail;
use Illuminate\Validation\Rule;
class Product_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product=Product::find($id);
        $attr= Attr::all();
        $product_detail=Product_detail::where('id_product','=',$id)->get();
        return view('backend.product_detail.index',compact('attr','product','product_detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
         $product=Product::find($id);
      $request->validate([
            'sku' => 'required|unique:product_details|max:255',
            'id_attr' => 'required',
            'price' => 'required|numeric',
            'discount' => 'numeric',
            'quantity' => 'numeric',
        ],[
            'sku.required' =>'Mã sản phẩm không được bỏ trống',
            'sku.unique' =>'Mã sản phẩm đã tồn tại',
            'sku.max' =>'Mã sản phẩm không vượt quá 255 kí tự',
            'id_attr.required' =>'Size không được bỏ trống',
            'price.required' =>'Giá sản phẩm không được bỏ trống',
            'price.numeric' =>'Giá sản phẩm phải là số',
            'discount.numeric' =>'% sản phẩm phải là số',
            'quantity.numeric' =>'Số lượng sản phẩm phải là số',
        ]);
      $product_detail =Product_detail::create([
            'id_product' =>$id,
            'sku' =>$request->sku,
            'id_attr' =>$request->id_attr,
            'price' =>$request->price,
            'discount' =>$request->discount,
            'quantity' =>$request->quantity,
            'status' =>$request->status,
        ]);
     return redirect()->back()->with('success','Thêm mới thành công');
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
    public function edit($id,$id_detail)
    {
    	$product = Product::find($id);
        $product_detail=Product_detail::find($id_detail);
        $attr= Attr::all();
        return view('backend.product_detail.edit',compact('attr','product','product_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $id_detail)
    {
        $product_detail=Product_detail::find($id_detail);
         $request->validate([
            'sku' => ['required','max:255',Rule::unique('product_details')->ignore($id_detail)],
            'price' => 'required|numeric',
            'discount' => 'numeric',
            'quantity' => 'numeric',
        ],[
            'sku.required' =>'Mã sản phẩm không được bỏ trống',
            'sku.unique' =>'Mã sản phẩm đã tồn tại',
            'sku.max' =>'Mã sản phẩm không vượt quá 255 kí tự',
            'price.required' =>'Mã sản phẩm không được bỏ trống',
            'price.numeric' =>'Giá sản phẩm phải là số',
            'discount.numeric' =>'% sản phẩm phải là số',
            'quantity.numeric' =>'Số lượng sản phẩm phải là số',
        ]);
      $product_detail->update([
            'id_product' =>$id,
            'sku' =>$request->sku,
            'id_attr' =>$request->id_attr,
            'price' =>$request->price,
            'discount' =>$request->discount,
            'quantity' =>$request->quantity,
            'status' =>$request->status,
        ]);
     return redirect()->route('product_detail_backend',$id)->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$id_detail)
    {
        $product_detail= Product_detail::find($id_detail);
        if($product_detail->order_details->count()>0||$product_detail->wishlists->count()>0){
            return redirect()->back()->with('error','Không thể xóa');
            }
            else{
                $product_detail->delete();
            return redirect()->back()->with('success','Xóa thành công');
        }
    }
}