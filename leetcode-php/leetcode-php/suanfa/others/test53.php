<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/27
 * Time: 2:56 下午
 * Desc:
 */

class Solution53
{
    public function maxSubArray($nums)
    {
        $res = $nums[0];
        $sum = 0;
        foreach ($nums as $num) {
            if($sum > 0){
                $sum +=$num;
            }else{
                $sum = $num;
            }
            $res = max($sum, $res);
        }
        return $res;
    }
}