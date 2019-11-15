<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/15
 * Time: 5:34 下午
 */

class Solution28
{
    public function strStr($haystack, $needle)
    {
        if($needle == null || $needle == ""){
            return 0;
        }
        $len1 = strlen($haystack);
        $len2 = strlen($needle);
        $i = 0;
        $res = -1;
        while($i <= $len1 - $len2){
            if(substr($haystack,$i,$len2) == $needle){
                $res = $i;
                break;
            }
            $i ++;
        }
        return $res;
    }
}