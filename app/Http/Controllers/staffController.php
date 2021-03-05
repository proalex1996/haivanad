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
}
