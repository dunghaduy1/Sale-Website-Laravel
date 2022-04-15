<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BackendController extends Controller {
	public function index() {
		$admin=Session::get('admin');
		if($admin==null){
			return redirect()->route('login');
		}
		else{
			return view('backend.index',compact('admin'));
		}
	}
	public function login() {
		// Admin::create([
		// 	'name' => 'admin',
		// 	'email' => 'tranhoan.dz@geail.com',
		// 	'password' => bcrypt('123456'),
		// ]);
		return view('backend.login');
	}
	public function postLogin(Request $req) {
		$admin=Admin::where('name','=',$req->name)->first();
		// dd($admin);
		if($admin==null){
			return redirect()->back()->with('error', 'Tài khoản không tồn tại');
		}
		else{
			$pass=$req->password;
			if(Hash::check($pass,$admin->password)) {
				Session::put('admin',$admin);
				// dd(Session::get('admin'));
				// dd('ddusng');
				return redirect()->route('backend')->with('success', 'Đăng nhập thành công');
			} else {
				return redirect()->back()->with('error', 'Sai mật khẩu');
			}
		}
		// if($admin)
		// dump($req->all());
		// dd(Auth::guard('admin')->attempt($req->only('name','password')));
		// if (Auth::guard('admin')->attempt($req->only('name', 'password'))) {
		// 	return redirect()->route('backend')->with('success', 'Đăng nhập thành công');
		// } else {
		// 	return redirect()->back()->with('error', 'Đăng nhập thất bại');
		// }
	}
	public function logout() {
		Session::forget('admin');
		return redirect()->route('login')->with('success', 'Đăng xuất thành công');
	}
}
?>