<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/12
 * Time: 8:42 上午
 */

class Solution16
{
    public function threeSumClosest($nums, $target)
    {
        $len = count($nums);
        if($len < 3){
            return false;
        }
        $k = 0;
        sort($nums);
        $res = $nums[0] + $nums[1] + $nums[$len - 1];
        while($k < $len - 2){
            $i = $k + 1;
            $j = $len - 1;
            while ($i < $j) {
                //echo $k . " " . $i ." " . $j . " " . $res. "\n";
                if (abs($nums[$k] + $nums[$j] + $nums[$i] - $target) < abs($res - $target)) {
                    $res = $nums[$k] + $nums[$i] + $nums[$j];
                }
                if ($nums[$k] + $nums[$i] + $nums[$j] < $target) {
                    $i++;
                    while ($nums[$i] == $nums[$i - 1] && $i < $j) {
                        $i++;
                    }
                } else {
                    $j--;
                    while ($nums[$j] == $nums[$j + 1]) {
                        $j--;
                    }
                }
            }
            $k ++;
        }
        return $res;
    }
}
$obj = new Solution16();
echo $obj->threeSumClosest([-1,2,1,4], 1);
