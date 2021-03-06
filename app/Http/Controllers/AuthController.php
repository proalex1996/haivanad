<?php
namespace App\Http\Controllers;
use App\Model\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AuthController extends Controller
{

    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        $rules = [
            'email' =>'required',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {

            return redirect('auth/login')->withErrors($validator)->withInput();

        } else {
            $params = $request->only('email', 'password');

            if( Auth::attempt($params)) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang

                return redirect('home');
            } else {
               // dd($validator);
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                $params1 = session()->flash('error', 'Email hoặc mật khẩu không đúng!');

                return redirect('auth/login');
            }
        }
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
