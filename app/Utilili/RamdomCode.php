<?php


namespace App\Utilili;


class RamdomCode
{
    public static function generateCode($maxId)
    {
        $char =now()->year."HV";
        $result = $char;
        if (is_null($maxId)){
            $result .= '00001';
        }else{
            $str = '00000';
            $length = strlen($maxId + 1);
            $result .= substr_replace($str, $maxId + 1, -$length);
        }
        return $result;
    }
}
