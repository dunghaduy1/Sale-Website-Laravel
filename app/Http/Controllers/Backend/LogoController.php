<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Validation\Rule;
class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$logos=Config::where('type','=','1')->get();
// dd($logo);
        return view('backend.config.logo.index', compact('logos'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.config.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = trim($request->value, url('/public/uploads/'));
        $request->validate([
            'name' => 'required|unique:configs|max:100',
            'slug' => 'required|unique:configs|max:100',
            'value' => 'required|unique:configs',
        ], [
            'name.required' =>'Tên logo không được bỏ trống',
            'name.unique' =>'Tên logo đã tồn tại',
            'name.max' =>'Tên logo không vượt quá 100 kí tự',
            'slug.required' =>'Slug không được bỏ trống',
            'slug.unique' =>'Slug đã tồn tại',
            'slug.max' =>'Slug không vượt quá 100 kí tự',
            'value.required' => 'Hình ảnh không được bỏ trống',
            'value.unique' => 'Hình ảnh đã tồn tại',
        ]);
        // dd($request->all());
        Config::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'value' => $value,
            'type' => $request->type,
            'status' => $request->status,
        ]);
        return redirect()->route('logo.index')->with('success', 'Thêm mới thành công');
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
        $logo = Config::find($id);
        // dd($logo->id);
        return view('backend.config.logo.edit', compact('logo'));
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
        $logo = Config::find($id);
        if ($request->value == '') {
            $value = $logo->value;
        } else {
            $value = trim($request->value, url('/public/uploads/'));
        }
        $request->validate([
            'name' => ['required','max:100',Rule::unique('configs')->ignore($id)],
            'slug' => ['required','max:100',Rule::unique('configs')->ignore($id)],
            'value' => 'unique:configs',
        ],[
            'name.required' =>'Tên logo không được bỏ trống',
            'name.unique' =>'Tên logo đã tồn tại',
            'name.max' =>'Tên logo không vượt quá 100 kí tự',
             'slug.required' =>'Slug không được bỏ trống',
            'slug.unique' =>'Slug đã tồn tại',
            'slug.max' =>'Slug không vượt quá 100 kí tự',
            'value.unique' => 'Hình ảnh đã tồn tại',
        ]);
        $logo->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'value' => $value,
            'type' => $request->type,
            'status' => $request->status,
        ]);
        return redirect()->route('logo.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logo = Config::find($id);
        $logo->delete();
        return redirect()->route('logo.index')->with('success', 'Xóa thành công');
    }
}
