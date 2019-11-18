<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/17
 * Time: 12:44 上午
 */

class Solution35
{
    public function searchInsert($nums, $target)
    {
        $len = count($nums);
        if(empty($nums)){
            return 0;
        }
        $start = 0;
        $end = $len - 1;
        if($target < $nums[0]){
            return 0;
        }elseif ($target > $nums[$end]){
            return $len;
        }
        while ($start <= $end){
            if($target == $nums[$start]){
                return $start;
            }elseif ($target == $nums[$end]){
                return $end;
            }
            $mid = intval(($start + $end) / 2);
            if($target == $nums[$mid]){
                return $mid;
            }elseif ($target > $nums[$mid]){
                $start = $mid;
            }elseif ($target < $nums[$mid]){
                $end = $mid;
            }
            if($start == $end - 1){
                return $end;
            }
        }
        return -1;
    }
}

$obj = new Solution35();
echo $obj->searchInsert([1], 1);
