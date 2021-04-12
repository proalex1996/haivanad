<?php
namespace App\Http\Controllers;
use App\Model\MenuModel;
use App\Model\Salary;
use App\Model\StatusBanner;
use App\Model\Type;
use App\Model\UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laravel\Dusk\Http\Controllers\UserController;
use phpDocumentor\Reflection\TypeResolver;

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
            $data = $request->all();
            $params = $request->only('email', 'password');
            $user = UserModel::where('email',$params)->first();
            $menu = MenuModel::all();

            if($user['id_status'] == 1){
                if( Auth::attempt($params)) {
                    Auth::user();
                    return redirect('/home');

                } else {

                    $params1 = session()->flash('error', 'Email hoặc mật khẩu không đúng!');
                    return redirect('auth/login');
                }
            }
            else{
                $params1 = session()->flash('error', 'Tài Khoảng Không Được Phép Truy Cập');
                return redirect('auth/login');
            }

        }
    }
    public function addStatus_product(Request $request){

            if(!empty($request->id)) {
                $checks = DB::table('status_banner')->select(DB::raw('count(id_status) as id_status'))->where('id_status', '=', $request->id)->get();
                foreach ($checks as $check){
                    if ($check->id_status == 0) {
                        $status_banner = new StatusBanner();
                        $status_banner->id_status = $request->id;
                        $status_banner->name_status = $request->name;
                        $status_banner->save();
                        return array(
                            'success' => true,
                            'status' => 200,
                            'message' => 'Thêm mới trạng thái thành công'
                        );
                    } else if ($check->id_status != 0) {
                        return array(
                            'success' => false,
                            'status' => 200,
                            'message' => 'Mã hoặc tên trạng thái đã tồn tại'
                        );
                    }
            }

            }
    }
    public function addType_product(Request $request){

            if(!empty($request->id)){
                $checks = DB::table('type_banner')->select(DB::raw('count(id_typebanner) as id_typebanner'))->where('id_typebanner','=',$request->id)->get();
                foreach ($checks as $check){
                    if ($check->id_typebanner == 0) {
                        $type = new Type();
                        $type->id_typebanner = $request->id;
                        $type->name_type = $request->name;
                        $type->save();
                        return array(
                            'success' => true,
                            'status' => 200,
                            'message' => 'Thêm loại hình sản phẩm mới thành công'
                        );
                    }
                    else if($check->id_typebanner != 0){
                        return array(
                            'success' => false,
                            'status' => 200,
                            'message' => 'Mã hoặc tên loại hình đã tồn tại'
                        );
                    }
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
