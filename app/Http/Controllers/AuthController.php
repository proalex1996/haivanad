<?php
namespace App\Http\Controllers;
use App\Model\MenuModel;
use App\Model\Kind;
use App\Model\Nguon_Customer;
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
    public function updatestatus_product(Request $request){
        if(!empty($request->id)){
            $status_banner = StatusBanner::where('id_status' ,$request->id)
                ->first();
            $status_banner->name_status= $request->name;
            $status_banner->save();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }else{
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Vui lòng nhập đầy đủ thông tin'
            );
        }



    }
    public function deletestatus_product(Request $request){
        try{
            $delete = StatusBanner::where('id_status',$request->id)->first();
            $delete->delete();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }catch (\Exception $e){
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Mã trạng thái đã đã được liên kết với sản phẩm, bạn phải cập nhật lại sản phẩm đó trước'
            );
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
    public function updateType_product(Request $request){
        if(!empty($request->id)){
            $branch = Type::where('id_typebanner' ,$request->id)
                ->first();
            $branch->name_type= $request->name;
            $branch->save();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }else{
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Vui lòng nhập đầy đủ thông tin'
            );
        }



    }
    public function deleteType_product(Request $request){
        try{
            $delete = Type::where('id_typebanner',$request->id)->first();
            $delete->delete();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }catch (\Exception $e){
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Mã chi nhánh đã đã được liên kết với sản phẩm bạn phải cập nhật lại sản phẩm đó trước'
            );
        }

    }
    public function add_nguon(Request $request){

        if(!empty($request->id)){
            $checks = DB::table('nguon_customer')->select(DB::raw('count(id_nguon) as id_nguon'))->where('id_nguon','=',$request->id)->get();
            foreach ($checks as $check){
                if ($check->id_nguon == 0) {
                    $type = new Nguon_Customer();
                    $type->id_nguon = $request->id;
                    $type->name_nguon = $request->name;
                    $type->save();
                    return array(
                        'success' => true,
                        'status' => 200,
                        'message' => 'Thêm mới thành công'
                    );
                }
                else if($check->id_typebanner != 0){
                    return array(
                        'success' => false,
                        'status' => 200,
                        'message' => 'Mã Nguồn đã tồn tại'
                    );
                }
            }


        }


    }
    public function update_nguon(Request $request){
        if(!empty($request->id)){
            $nguon = Nguon_Customer::where('id_nguon' ,$request->id)
                ->first();
            $nguon->name_nguon= $request->name;
            $nguon->save();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }else{
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Vui lòng nhập đầy đủ thông tin'
            );
        }



    }
    public function delete_nguon(Request $request){
        try{
            $delete = Nguon_Customer::where('id_nguon',$request->id)->first();
            $delete->delete();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }catch (\Exception $e){
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Mã chi nhánh đã đã được liên kết với sản phẩm bạn phải cập nhật lại sản phẩm đó trước'
            );
        }

    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');


    }

}
