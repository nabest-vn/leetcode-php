<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/11
 * Time: 8:45 上午
 */

class Solution12
{

    public function intToRoman($num)
    {
        if($num < 1 || $num > 3999){
            return 0;
        }
        $res = "";
        $thousand = intval($num / 1000);
        $hundred = intval( $num / 100) % 10;
        $ten = intval($num / 10) % 10;
        $one = $num % 10;
        while ($thousand > 0){
            $res .= "M";
            $thousand --;
        }
        if($hundred == 9){
            $res .= "CM";
        }elseif ($hundred == 4){
            $res .= "CD";
        }else{
            if ($hundred >= 5){
                $res .= "D";
            }
            while($hundred % 5 > 0){
                $res .= "C";
                $hundred --;
            }
        }

        if($ten == 9){
            $res .= "XC";
        }elseif ($ten == 4){
            $res .= "XL";
        }else{
            if ($ten >= 5){
                $res .= "L";
            }
            while($ten % 5 > 0){
                $res .= "X";
                $ten --;
            }
        }

        if($one == 9){
            $res .= "IX";
        }elseif ($one == 4){
            $res .= "IV";
        }else{
            if ($one >= 5){
                $res .= "V";
            }
            while($one % 5 > 0){
                $res .= "I";
                $one --;
            }
        }

        return $res;
    }
}