<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        $menu = DB :: table('parent_menu')->get();
        return view('layouts.master',['menu'=>$menu]);
    }
}
