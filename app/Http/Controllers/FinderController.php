<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class finderController extends Controller
{
    public function index()
    {
        $banners = DB::table('banner')
            ->select('*')->get();
        return view('pages.finder.index',['banners'=>$banners]);
    }
    public function getInfo(Request $request){
        $infos = DB::table(banner)
    }
}
