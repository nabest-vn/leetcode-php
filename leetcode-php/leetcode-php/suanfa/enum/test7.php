<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/10
 * Time: 1:07 下午
 */

class Solution7
{

    function reverse($x) {
        $str = "";
        $flag = true;
        if(strval($x){0} == "-"){
            $flag = !$flag;
            $str = substr(strrev(strval($x)), 0 ,strlen(strval($x)) - 1);
        } else{
            $str = strrev(strval($x));
        }
        if($flag && intval($str) > pow(2,31) - 1){
            return 0;
        }elseif (!$flag && intval($str) > pow(2,31)){
            return 0;
        }elseif ($flag){
            return intval($str);
        }
        return 0 - intval($str);
    }
}