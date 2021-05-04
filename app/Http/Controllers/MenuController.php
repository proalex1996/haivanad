<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\MenuModel;
use App\Model\UserModel;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index($index)
    {
        $menu = $index;dd($menu);

        return view('pages.top-page.master',
            [
                'menus'=>$menu

            ]);
    }
}
