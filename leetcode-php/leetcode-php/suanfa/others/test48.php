<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/26
 * Time: 2:31 下午
 * Desc:
 */

class Solution48
{

    /**
     * @param $nums
     * @desc 顺时针旋转90度，等于将数组沿对角线折叠，再按照中间线进行对着
     */
    public function rotate(&$nums)
    {
        if(count($nums) <= 1){
            return;
        }
        $n = count($nums);
        for($i = 0;$i < $n;$i ++){
            for($j = $i;$j < $n;$j ++){
                $temp = $nums[$i][$j];
                $nums[$i][$j] = $nums[$j][$i];
                $nums[$j][$i] = $temp;
            }
        }
        $half =($n - 1) / 2;
        for($i = 0;$i < $n;$i ++){
            for($j = 0;$j < $half;$j ++){
                $temp = $nums[$i][$j];
                $nums[$i][$j] = $nums[$i][$n - 1 -$j];
                $nums[$i][$n - 1 -$j] = $temp;
            }
        }
    }
}

$obj = new Solution48();
$nums = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];
$obj->rotate($nums);
print_r($nums);
