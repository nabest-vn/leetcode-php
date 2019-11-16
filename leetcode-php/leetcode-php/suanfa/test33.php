<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/16
 * Time: 2:28 下午
 */

class Solution33
{
    public function search($nums, $target)
    {
        $len = count($nums);
        $first = 0;
        $end = $len - 1;
        if(count($nums) == 1 && $nums[0] == $target){
            return 0;
        }
        while($first < $end){
            //echo $first .' ' . $end. "\n";
            if($target == $nums[$first]){
                return $first;
            }elseif ($target == $nums[$end]) {
                return $end;
            }
            $mid = intval(($first + $end)/ 2);
            if($nums[$mid] == $target){
                return $mid;
            }
            //echo $mid ."\n";
            //mid>first表示还再递增
            if($nums[$mid] > $nums[$first]){
                if($target> $nums[$first] && $target < $nums[$mid]){
                    $end = $mid - 1;
                    continue;
                }
                $first = $mid + 1;
            }else{
                if($target > $nums[$mid] && $target < $nums[$end]){
                    $first = $mid + 1;
                    continue;
                }
                $end = $mid - 1;
            }
        }
        return -1;
    }
}

$obj = new Solution33();
echo $obj->search([4,5,6,7,0,1,2], 0);