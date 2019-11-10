<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/10
 * Time: 1:16 下午
 */

class Solution8
{
    function myAtoi($str) {
        $str = trim($str);
        $pattern = "/^([+\-\d]+).*$/";
        if(preg_match($pattern,$str, $out)){
            $res = intval($out[1]);
            if($res > pow(2,31) - 1){
                return pow(2, 31) - 1;
            }elseif($res < -pow(2, 31)){
                return -pow(2, 31);
            }
            return $res;
        }
        return 0;
    }
}

$obj = new Solution8();
echo $obj->myAtoi("words and 987")."\n";
echo $obj->myAtoi("4193 with words")."\n";
echo $obj->myAtoi("42")."\n";
echo $obj->myAtoi("-42")."\n";
echo $obj->myAtoi(-91283472332)."\n";
