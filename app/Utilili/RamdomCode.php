<?php


namespace App\Utilili;


class RamdomCode
{
    public static function generateCode($catelory,$maxId)
    {
        $char =substr(''.now()->year.'',2,2).$catelory."-HV";
        $result = $char;
        if (is_null($maxId)){
            $result .= '0001';
        }else{
            $str = '0000';
            $length = strlen($maxId + 1);
            $result .= substr_replace($str, $maxId + 1, -$length);
        }
        return $result;
    }
}
