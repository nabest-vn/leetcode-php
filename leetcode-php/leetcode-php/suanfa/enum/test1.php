<?php

/**
 * Class Solution1
 * Desc
 */

/*
 * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那两个整数，
 * 并返回他们的数组下标。
 * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 */
class Solution1
{

    /**
     * @
     * @param $nums
     * @param $target
     * @return array|bool
     * @desc 暴力破解两个数之和是否可等于其中的一个数，两层for循环遍历数组
     * 时间复杂度O(n2)，空间复杂度O(1)
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