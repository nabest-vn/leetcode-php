<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/18
 * Time: 9:04 下午
 * Desc:
 */


class Solution38
{

    public function countAndSay($n){
        if($n < 1){
            return '';
        }elseif ($n == 1){
            return '1';
        }
        $s = $this->countAndSay($n - 1);
        $slen = strlen($s);
        $flag = '';
        $len = 0;
        $res = '';
        for($i = 0;$i < $slen;$i ++){
            if($flag == $s{$i}){
                $len ++;
            }else{
                $res .= strval($len).$flag;
                $flag = $s{$i};
                $len = 1;
            }
            if($i == $slen - 1){
                $res .= strval($len).$flag;
            }
        }
        return substr($res,1,strlen($res) - 1);
    }
}

$obj = new Solution38();
echo $obj->countAndSay(5);
