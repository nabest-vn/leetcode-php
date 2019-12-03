<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/12/3
 * Time: 3:22 下午
 * Desc:
 */


class Solution55
{
    public function canJump($nums)
    {
        $len = count($nums);
        $i = $len - 2;
        if ($nums[0] == 0 && $len > 1) {
            return false;
        }
        while ($i >= 0) {
            if ($nums[$i] == 0) {
                $j = $i - 1;
                while ($j >= 0) {
                    if ($nums[$j] > ($i - $j)) {
                        $i = $j;
                        break;
                    }
                    $j--;
                    if ($j == -1) {
                        return false;
                    }
                }
            }
            $i--;
        }
        return true;
    }

    public function canJump2($nums)
    {
        $len = count($nums);
        $i = 0;
        if ($len > 1 && $nums[0] == 0) {
            return false;
        }
        while ($i < $len - 1) {
            $max = $nums[$i];
            $current = $i;
            //echo $i . " " . $max . " \n";
            for ($j = 1; $j <= $nums[$i]; $j++) {
                //echo $j . " " . ($nums[$i + $j] + $j + $i) ." " . $max . " " . $current ."\n";
                if ($nums[$i + $j] + $j + $i >= $max) {
                    $max = $nums[$i + $j] + $j + $i;
                    $current = $i + $j;
                }
                //echo $max ."\n";
            }
            $i = $current;
            if ($nums[$i] == 0 && $i < $len - 1) {
                return false;
            }
        }
        return true;
    }
}

$obj = new Solution55();
echo $obj->canJump2([5, 9, 3, 2, 1, 0, 2, 3, 3, 1, 0, 0]);
