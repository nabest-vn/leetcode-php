<?php


/**
 * Class Solution
 */
class Solution1
{

    /*
     *暴力破解法
     * 时间复杂度：O（n2）
     * 空间复杂度O(1)
     */
    function twoSum($nums, $target)
    {
        if (!is_array($nums) || !is_numeric($target)) {
            return false;
        }
        $len = count($nums);
        for ($i = 0; $i < $len - 1; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
        return false;
    }
}