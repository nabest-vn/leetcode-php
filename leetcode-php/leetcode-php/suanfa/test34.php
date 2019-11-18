<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/16
 * Time: 11:31 下午
 */

class Solution34
{
    public function searchRange($nums, $target)
    {
        $len = count($nums);
        if($len  == 0 || $nums[0] > $target || $nums[$len - 1] < $target){
            return [-1,-1];
        }
        $start = 0;
        $end = $len -1;
        $index = -1;
        while($start <= $end){
            if($nums[$start] == $target){
                $index = $start;
                break;
            }
            if($nums[$end] == $target){
                $index = $end;
                break;
            }
            $mid = intval(($start + $end) / 2);
            if($nums[$mid] == $target){
                $index = $mid;
            }
            if($nums[$mid] > $target){
                $end = $mid - 1;
                $start ++;
            }else{
                $start = $mid + 1;
            }
        }
        if($index == -1){
            return [-1,-1];
        }

        $min = $max = $index;
        $left = 0;
        $right = $index;
        while ($left < $right){
            if($nums[$left] == $target){
                $min = $left;
                break;
            }
            $mid = intval(($right + $left) / 2);
            if($nums[$mid] == $target){
                $left ++;
                $right = $mid;
            }else{
                $left = $mid + 1;
            }
            if($left >= $right){
                $min = $right;
            }
        }
        $left = $index;
        $right = $len -1;
        while($left < $right){
            if($nums[$right] == $target){
                $max = $right;
                break;
            }
            $mid = intval(($left + $right) / 2);
            if($nums[$mid] == $target){
                $left = $mid;
                $right --;
            }else{
                $right = $mid - 1;
            }
            if($left >= $right){
                $max = $right;
            }
        }
        return [$min,$max];
    }
}

$obj = new Solution34();
print_r($obj->searchRange([1], 1));
