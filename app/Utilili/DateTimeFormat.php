<?php


namespace App\Utilili;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DateTimeFormat
{
    public static function getDate($date_end){
        $datenow = Carbon::now('Asia/Ho_Chi_Minh');
        $date_end = strtotime($date_end);
        $now = strtotime($datenow);
        $valueDate = $date_end - $now;
        return round($valueDate / (60 * 60 * 24),4);
    }
}
