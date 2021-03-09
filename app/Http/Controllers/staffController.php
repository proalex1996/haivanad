<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class staffController extends Controller
{
    public function quyenController(){
        $acc = DB::table('staff')
            ->join('user', 'id_use','=','id_staff')
            ->select('*')->get();
        return view('pages.top-page.master',['accs' => $acc]);
    }
    public function getIndex(){
        $users = DB::table('users')
            ->join('branch','id_staff','=','id_branch')
            ->join('salary','users.id_salary','=','salary.id_salary')
            ->join('status','users.id_status','=','status.id_staff')
            ->join('phan_quyen','id_phan_quyen','=','phan_quyen.id')
            ->select('users.id','users.name','email','created_at','staff_adress','staff_phone','id_CMND','branch.name_branch','status.status','bassic_salary','extra_salary','phan_quyen.name')->get();
            return view('pages.users.index',[
                'users'=>$users,
            ]);
    }
}
