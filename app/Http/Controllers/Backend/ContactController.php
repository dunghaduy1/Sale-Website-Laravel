<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Validation\Rule;
class ContactController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $config=Config::where([['type','=','3']])->get();
        return view('backend.config.contact.index', compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.config.contact.create');
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
            'name' => 'unique:configs',
        ], [
            'name.unique' =>'Đã có cấu hình này',
        ]);
        Config::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'value' => $request->value,
            'type' => $request->type,
            'status' => $request->status,
        ]);
        return redirect()->route('contact.index')->with('success', 'Thêm mới thành công');
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
        $contact = Config::find($id);
        return view('backend.config.contact.edit', compact('contact'));
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
        $contact = Config::find($id);
        $contact->update([
            // 'name' => $request->name,
            // 'slug' => $request->slug,
            // 'type' => $request->type,
            'value' => $request->value,
            'status' => $request->status,
        ]);
        return redirect()->route('contact.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Config::find($id);
        dd($contact);
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Xóa thành công');
    }
}
