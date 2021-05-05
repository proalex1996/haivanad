<?php


namespace App\Http\Controllers;


use App\Exports\ExportProduct;
use App\Exports\ExportStaff;
use App\Imports\ImportStaff;
use App\Model\Position;
use App\Model\staffModel;
use App\Repositories\Staff\staffRepositoryEloquent;
use App\Utilili\RamdomCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
use MongoDB\Driver\Session;
use phpseclib3\Crypt\Hash;

class staffController extends Controller
{
    protected $staffRepository;

    public function __construct( staffRepositoryEloquent $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function getIndex(Request $request)
    {
        $users = DB::table('users')
            ->join('branch', 'users.id_branch', '=', 'branch.id_branch')
            ->join('status', 'users.id_status', '=', 'status.id_status')
            ->join('phan_quyen', 'id_phan_quyen', '=', 'phan_quyen.id_pq')
            ->join('positions','users.id_position','=','positions.id_position')
            ->select('users.id','users.id_staff', 'phan_quyen.name_pq','users.id_branch', 'users.name', 'email', 'created_at', 'staff_adress', 'staff_phone', 'id_CMND',
                'branch.name_branch', 'status.status','positions.name_position', 'id_salary', 'users.born',
                'phan_quyen.name_pq', 'phan_quyen.id_pq', 'status.id_status');
        if (!empty($request->staff_phone)) {
            $users = $users->where('users.staff_phone', 'LiKE', '%'.$request->staff_phone.'%');
        }
        if (!empty($request->id_status)) {
            $users = $users->where('status.id_status', '=', $request->id_status);
        }
        if (!empty($request->name)) {
            $users = $users->where('users.name', 'LIKE', '%'.$request->name.'%');
        }
        $users = $users->orderBy('users.id_staff','DESC')->get();
        $statuss = DB::table('status')->select('*')->get();
        $pq = DB::table('phan_quyen')->select('*')->get();
        return view('pages.users.index', [
            'users' => $users,
            'statuss' => $statuss,
            'pqs' => $pq
        ]);
    }
    public function createStaff(){
        $maxid = DB::table('users')->max('id');
        $catelory = "NV";
        $code = RamdomCode::generateCode($catelory,$maxid);
        $branchs = DB::table('branch')->select('*')->get();
        $salarys = DB::table('salary')->select('*')->get();
        $statuss = DB::table('status')->select('*')->get();
        $phan_quyen = DB::table('phan_quyen')->select('*')->get();
        $positions = DB::table('positions')->select('*')->get();
        return view('pages.users.add',[
           'branchs' => $branchs,
            'salarys' => $salarys,
            'statuss' => $statuss,
            'phan_quyen' => $phan_quyen,
            'positions' => $positions,
            'codes' => $code
        ]);
    }
    public function addStaff(Request $request){
        $check = DB::table('users')->select(DB::raw('count(*) as count'))->where('email','=',$request->staff_email)->get();
        $check1 = json_decode($check);
        if($check1[0]->count != 0 ){
            \session()->flash('warn','Email đã tồn tại');
            return back();
        }else{
            $users = new staffModel();
            $users->id_branch = $request->staff_branch;
            $users->name = $request->name_staff;
            $users->email = $request->staff_email;
            $users->password = \Illuminate\Support\Facades\Hash::make($request->password);
            $users->non_password = $request->password;
            $users->staff_phone = $request->staff_phone;
            $users->staff_adress = $request->staff_adress;
            $users->id_CMND = $request->id_cmnd;
            $users->born = $request->date_start;
            $users->id_position = $request->id_position;
            $users->id_salary = $request->bassic_salary;
            $users->id_status = $request->staff_status;
            $users->id_phan_quyen = $request->id_pq;
            $users->id_staff = $request->id_staff;
            $users->save();
            return redirect()->action('staffController@getIndex');
        }

    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if (!empty($data)) {
                $data['non_password'] = $data['password'];
                $data['password'] = \Illuminate\Support\Facades\Hash::make($data['password']);
                $up = $this->staffRepository->update($id, $data);
                return redirect()->action('staffController@getIndex');
            }
            $staffs = $this->staffRepository->find($id);
            $statuss = DB::table('status')->select('*')->get();
            $branchs = DB::table('branch')->select('*')->get();
            $salarys = DB::table('salary')->select('*')->get();
            $pq = DB::table('phan_quyen')->select('*')->get();
            $position = DB::table('positions')->select('*')->get();
            return view('pages.users.update', [
                'staffs' => $staffs,
                'statuss' => $statuss,
                'branchs' => $branchs,
                'salarys' => $salarys,
                'pqs' => $pq,
                'positions' => $position
            ]);
    }




    public function destroy($id)
    {
        try {
            $del = staffModel::find($id);
            $del->delete();
            return redirect('/users');
        } catch (\Exception $e) {
            'Xóa thất bại';
            return redirect(URL::to('users'));

        }
    }
    public function importStaff(){
        return view('pages.users.import');
    }
    public function import(Request $request)
    {
        $file = $request->file('file');
        if (!empty($file)) {
            Excel::import(new ImportStaff, $file);
            return redirect()->action('staffController@getIndex');
        } else {
            return ['File Dữ Liệu trống'];
        }
    }
    public function dowloadExample(){
        return redirect('public/storage/contract/ExmpleProduct.xlsx');
    }
    public function quyen1($id){
        $staff = staffModel::find($id);
        if($staff){
            $staff->id_phan_quyen = 1;
            $result = $staff->update();
        }
        return redirect()->action('staffController@getIndex');
    }
    public function quyen2($id){
        $staff = staffModel::find($id);
        if($staff){
            $staff->id_phan_quyen = 2;
            $result = $staff->update();
        }
        return redirect()->action('staffController@getIndex');
    }
    public function status1($id){
        $status = staffModel::find($id);
        if($status){
            $status->id_status = 1;
            $result = $status->update();
        }
        return redirect()->action('staffController@getIndex');
    }
    public function status2($id){
        $status = staffModel::find($id);
        if($status){
            $status->id_status = 2;
            $result = $status->update();
        }
        return redirect()->action('staffController@getIndex');
    }
    public function export()
    {
        return Excel::download(new ExportStaff, 'Danh Sách Nhân Viên.xlsx');
    }
    public function addPosition(Request $request){
        $checks = DB::table('positions')->select(DB::raw('count(id_position) as id_position'))->where('id_position','=',$request->id)->get();
        foreach ($checks as $check){
            if($check->id_position == 0){
                $position = new Position();
                $position ->id_position = $request->id;
                $position->name_position = $request->name;
                $position->save();
                return array(
                    'success' => true,
                    'status' => 200,
                    'message' => 'Cập nhận thành công'
                );
            }else{
                return array(
                    'success' => false,
                    'status' => 200,
                    'message' => 'Mã nhập vào đã tồn tại'
                );
            }
        }

    }
    public function updatePosition(Request $request){
        if(!empty($request->id)){
            $position = Position::where('id_position' ,$request->id)
                ->first();
            $position->name_position = $request->name;
            $position->save();


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
    public function deletePosition(Request $request){
        try{
            $position = Position::where('id_position' ,$request->id)
                ->first();
            $position->delete();
            return array(
                'success' => true,
                'status' => 200,
                'message' => 'Cập nhận thành công'
            );
        }catch (\Exception $e){
            return array(
                'success' => false,
                'status' => 200,
                'message' => 'Mã trạng thái đã được liên kết với 1 nhân viên bạn phải xóa nhân viên đó trước'
            );
        }

    }
}
