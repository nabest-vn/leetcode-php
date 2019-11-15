<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/13
 * Time: 10:14 下午
 */


class Solution26
{
    public function removeDuplicates($nums)
    {
        if(empty($nums)){
            return $nums;
        }
        $i = 1;
        $j = 0;
        $len = count($nums);
        while ($i < $len){
            if($nums[$i] != $nums[$j]){
                $j ++;
            }
            $nums[$j] = $nums[$i];
            $i ++;
        }
        while($j < $len){
            $j ++;
            unset($nums[$j]);
        }
        return $nums;
    }
}

$obj = new Solution26();
$nums = [1,1,2];
print_r($obj->removeDuplicates($nums));
