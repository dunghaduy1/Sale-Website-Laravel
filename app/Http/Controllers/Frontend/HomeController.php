<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Banner;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller {
	
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	//  */
	// public function index()
	// {
	//     return view('home');
	// }
	public function dang_ky() {
		return view('frontend.pages.register');
	}
	public function post_dang_ky(Request $request) {
		$request->validate([
			'name' => 'required',
			'email' => 'required|unique:users',
			'password' => 'required|min:8',
			're_password' => 'required|min:8',
			'phone' => 'required|unique:users|max:15',
			'birthday' => 'required',
			'address' => 'required',
			// 'image'=>'required|mimes:jpg,png,gif,jpeg'
		], [
			'name.required' => 'Tên không được bỏ trống',
			'email.required' => 'Email không được bỏ trống',
			'email.unique' => 'Email đã tồn tại',
			'password.required' => 'Mật khẩu không được bỏ trống',
			're_password.required' => 'Mật khẩu không được bỏ trống',
			'password.min' => 'Mật khẩu phải có đủ 8 ký tự không được bỏ trống',
			're_password.min' => 'Mật khẩu phải có đủ 8 ký tự không được bỏ trống',
			'phone.required' => 'Số điện thoại không được bỏ trống',
			'phone.unique' => 'Số điện thoại đã tồn tại',
			'phone.max' => 'Số điện thoại không vượt quá 15 kí tự',
			'birthday.required' => 'Ngày sinh không được bỏ trống',
			'address.required' => 'Địa chỉ không được bỏ trống',
			// 'image.required'=>'Ảnh không được bỏ trống',
			// 'image.mimes'=>'Ảnh phải là jpg,jpeg,gif, png',
		]);
		if (isset($request->image)){
			$file_name = time().$request->image->getClientOriginalName();
        // đẩy file vào thư mục uploads
        // dd($request->image);
        $request->image->move(base_path('public/uploads/Users'),$file_name);
		}
		else{
			$file_name='';
		}
		// dd($file_name);
		User::create([
			'name' => $request->name,
			'avatar' => $file_name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
			'phone' => $request->phone,
			'birthday' => $request->birthday,
			'address' => $request->address,
		]);
		return redirect()->route('dang-nhap')->with('success', 'Đăng ký thành công');
	}
	public function dang_nhap() {
		return view('frontend.pages.login');
	}
	public function post_dang_nhap(Request $request) {
		// dump($request->all());
		// dd(Auth::guard('user')->attempt($request->only('email','password')));
		if (Auth::guard('user')->attempt($request->only('email', 'password'))) {
			return redirect()->route('home')->with('success', 'Đăng nhập thành công');
		} else {
			return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu
                không đúng');
		}
	}
	public function post_check_out(Request $request) {
		// dump($request->all());
		// dd(Auth::guard('user')->attempt($request->only('email','password')));
		if (Auth::guard('user')->attempt($request->only('email', 'password'))) {
			return redirect()->back()->with('success', 'Đăng nhập thành công');
		} else {
			return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu
                không đúng');
		}
	}
	public function dang_xuat() {
		Auth::guard('user')->logout();
		return redirect()->route('dang-nhap')->with('success', 'Đăng xuất thành công');
	}
}
