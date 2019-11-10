<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/11
 * Time: 12:13 上午
 */

class Solution11
{

    //暴力破解---超时。。。。
    public function maxArea1($height)
    {
        $len = count($height);
        if($len <= 1){
            return 0;
        }
        $max = 0;
        for($i = 0; $i < $len -1; $i ++){
            for($j = $i + 1; $j < $len; $j ++){
                $max = min($height[$i], $height[$j]) * ($j - $i) > $max ? min($height[$i], $height[$j]) * ($j - $i) : $max;
            }
        }
        return $max;
    }

    public function maxArea($height)
    {
        $len = count($height);
        $max = 0;
        $minHeight = 0;
        if($len <= 1){
            return $max;
        }
        $i = 0;
        $j = $len - 1;
        while ($i < $j){
            if(min($height[$i],$height[$j]) <= $minHeight){
                if($height[$i] < $height[$j]){
                    $i ++;
                }else{
                    $j --;
                }
                continue;
            }
            $minHeight = max($minHeight, min($height[$j], $height[$i]));
            if($height[$i] < $height[$j]){
                if($max <= $height[$i] * ($j - $i)){
                    $max = $height[$i] * ($j - $i);
                }
                $i ++;
            }else{
                if($max <= $height[$j] * ($j -$i)){
                    $max = $height[$j] * ($j - $i);
                }
                $j --;
            }
        }
        return $max;
    }
}
$obj = new Solution11();

$arr = [1,8,6,2,5,4,8,3,7];
echo $obj->maxArea($arr);