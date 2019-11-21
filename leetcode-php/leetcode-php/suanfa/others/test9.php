<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/10
 * Time: 1:35 下午
 */

class Solution9
{
    function isPalindrome($x) {
        $str = strval($x);
        if($str == strrev($str)){
            return true;
        }
        return false;
    }
}