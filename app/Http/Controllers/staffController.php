<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class staffController extends Controller
{
    public function quyenController()
    {
        $acc = DB::table('staff')
            ->join('user', 'id_use', '=', 'id_staff')
            ->select('*')->get();
        return view('pages.top-page.master', ['accs' => $acc]);
    }

    public function getIndex(Request $request)
    {
        $users = DB::table('users')
            ->join('branch', 'id_staff', '=', 'id_branch')
            ->join('salary', 'users.id_salary', '=', 'salary.id_salary')
            ->join('status', 'users.id_status', '=', 'status.id_status')
            ->join('phan_quyen', 'id_phan_quyen', '=', 'phan_quyen.id_pq')
            ->select('users.id', 'users.id_staff', 'users.name', 'email', 'created_at', 'staff_adress', 'staff_phone', 'id_CMND',
                'branch.name_branch', 'status.status', 'bassic_salary', 'users.born', 'extra_salary',
                'phan_quyen.name_pq', 'phan_quyen.id_pq', 'status.id_status');
        if (!empty($request->id_name)) {
            $users = $users->where('users.name', '=', $request->id_name);
        }
        if (!empty($request->id_status)) {
            $users = $users->where('status.id_status', '=', $request->id_status);
        }
        if (!empty($request->id_staff)) {
            $users = $users->where('users.id_staff', 'LIKE', '%'.$request->id_staff.'%');
        }
        $users = $users->get();
        $statuss = DB::table('status')->select('*')->get();
        $pq = DB::table('phan_quyen')->select('*')->get();
        return view('pages.users.index', [
            'users' => $users,
            'statuss' => $statuss,
            'pqs' => $pq
        ]);
    }
}
