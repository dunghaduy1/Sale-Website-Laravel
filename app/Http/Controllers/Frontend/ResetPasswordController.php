<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\PasswordReset;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function recover()
    {
        // dd('ok');
        return view('frontend.pages.recoverpw');
    }
    public function sendMail(Request $request)
    {
    	//Tạo token và gửi đường link reset vào email nếu email tồn tại
        $email=$request->email;
        $result = User::where('email', $email)->first();
    	if($result){
    		$resetPassword = PasswordReset::firstOrCreate(['email'=>$request->email, 'token'=>Str::random(60)]);
    		$token = PasswordReset::where('email', $request->email)->first();
            $link = url('dat-lai-mat-khau')."/".$token->token;
            $data = [
                'name'=>$result->name,
                'email'=>$email,
                'link'=>$link,
            ];
            //send it to email
            Mail::send('email.recover-password', $data, function ($message) use ($data) {
                        $message->from('ph1911ij@gmail.com','Shop teaa');
                        $message->to($data['email'], $data['name'])->subject('Yêu cầu tạo lại mật khẩu của bạn');
                    });
        return redirect()->back()->with('success', 'Link đặt lại mật khẩu đã gửi tới email: '.$email.'');
    	} else {
    		return redirect()->back()->with('error', 'Email không tồn tại');
        }
        // dd('ok');
    }

    // public function sendMail(Request $request)
    // {
    //     $email = $request->email;
    //     // dd($email);
    //     $checkUser = User::where('email', $email)->first();

    //     if (!$checkUser) {
    //         return redirect()->back()->with('error', 'Email không tồn tại');
    //     }
    //     $code = bcrypt(md5(time() . $email));
    //     $checkUser->code = $code;
    //     $checkUser->time_code = Carbon::now();
    //     $checkUser->save();
    //     Mail::send('email.recover-password', $checkUser->toArray(), function ($message) use ($email) {
    //         $message->from('ph1911ij@gmail.com','Shop teaa');
    //         $message->to($email, 'Visitor')->subject('Thư đặt lại mật khẩu');
    //     });
    //     return redirect()->back()->with('success', 'Link đặt lại mật khẩu đã gửi tới email: '.$email.'');
    // }

    public function resetPassword(Request $request)
    {
        // Check token valid or not
    	$result = PasswordReset::where('token', $request->token)->first();

    	$data['info'] = $result->token;

    	if($result){
            return view('frontend.pages.reset_password',$data);
    	} else {
    		echo 'Liên kết này đã hết hạn';
    	}
    }
    public function newPass(Request $request)
    {
        $request->validate([
            'password' => ['required','min:8'],
            'confirm' => ['required','same:password','min:8'],
        ],[
			'password.required' => 'Mật khẩu không được bỏ trống',
			'password.min' => 'Mật khẩu phải có đủ 8 ký tự',
			'confirm.required' => 'Mật khẩu không được bỏ trống',
			'confirm.min' => 'Mật khẩu phải có đủ 8 ký tự',
			'confirm.same' => 'Mật khẩu không trùng khớp',
        ]);
        // dd($request->token);
    		// Check email with token
    		$result = PasswordReset::where('token', $request->token)->first();
    		// Update new password
    		User::where('email', $result->email)->update(['password'=>bcrypt($request->password)]);
    		// Delete token
    		PasswordReset::where('token', $request->token)->delete();
    		return redirect()->route('dang-nhap')->with('success','Mật khẩu thay đổi thành công');
    }
}
