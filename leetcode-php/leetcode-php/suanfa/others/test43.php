<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/22
 * Time: 2:43 下午
 * Desc:
 */


class Solution43
{
    public function multiply($num1,$num2)
    {
        if($num1 == '0' || $num2 =='0'){
            return '0';
        }
        $res = '';
        $len1 = strlen($num1);
        $len2 = strlen($num2);
        $num1 = strrev($num1);
        $num2 = strrev($num2);
        for($i = 0;$i < $len2;$i ++){
            $flag = 0;
            for($j = 0;$j < $len1;$j ++){
                echo $res . " " . $flag ."\n";
                $num = intval($res{$i+$j}) + $flag + intval($num1{$j}) * intval($num2{$i});
                $res{$i + $j} = strval($num % 10);
                $flag = intval($num / 10);
            }
            if($flag > 0){
                $res .= intval($flag);
            }
        }
        $res = strrev($res);
        $len = strlen($res);
        for($i =0;$i<$len;$i++){
            if($res{$i} != 0){
                break;
            }
        }
        return substr($res,$i,$len - $i);
    }

    function multiply2($num1,$num2)
    {
        if($num1 == '0' || $num2 == '0'){
            return '0';
        }
        $len1 = strlen($num1);
        $len2 = strlen($num2);
        $num1 = strrev($num1);
        $num2 = strrev($num2);
        $arr = [];
        for($i=0;$i<$len1;$i++){
            for($j = 0;$j < $len2;$j ++){
                $num = intval($num1{$i}) * intval($num2{$j});
                $arr[$i + $j][] = $num % 10;
                $arr[$i + $j + 1][] = intval($num / 10);
            }
        }
        $res = "";
        $len = count($arr);
        $flag = 0;
        for($i=0;$i<$len;$i++){
            $sum = 0;
            for($j =0;$j<count($arr[$i]);$j++){
                $sum +=$arr[$i][$j];
            }
            $sum += $flag;
            $res .= strval($sum % 10);
            $flag = intval($sum / 10);
        }
        if($flag > 0){
            $res .=strval($flag);
        }
        $res = strrev($res);
        for($i = 0;$i< strlen($res);$i ++){
            if($res{$i} != 0){
                break;
            }
        }
        return substr($res,$i,strlen($res) - $i);
    }
}

$obj = new Solution43();
echo $obj->multiply2('14','23');