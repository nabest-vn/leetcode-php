<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/11
 * Time: 9:54 下午
 */

class Solution15
{
    public function threeSum($nums)
    {
        $res = [];
        $len = count($nums);
        if($len <= 2){
            echo $res;
        }
        sort($nums);
        $k = 0;
        while($k < $len - 2){
            if($nums[$k] > 0){
                break;
            }
            $i = $k + 1;
            $j = $len - 1;
            while ($i < $j){
                //echo $k . " " . $nums[$k] . " ". $nums[$i] . " " . $nums[$j] . " \n";
                if($nums[$i] + $nums[$j] + $nums[$k] == 0){
                    $res[] = [$nums[$k], $nums[$i], $nums[$j]];
                    $i ++;
                    $j --;
                    while ($nums[$i] == $nums[$i - 1] && $i <= $j){
                        $i ++;
                    }
                    while ($nums[$j] == $nums[$j + 1] && $i <= $j){
                        $j --;
                    }
                }elseif ($nums[$i] + $nums[$j] + $nums[$k] > 0){
                    $j --;
                    while ($nums[$j] == $nums[$j + 1] && $i<= $j){
                        $j --;
                    }
                }else{
                    $i ++;
                    while ($nums[$i] == $nums[$i -1] && $i <= $j){
                        $i ++;
                    }
                }

            }
            $k ++;
        }

        //return $res;
        return array_unique($res, SORT_REGULAR);
    }
}
$obj = new Solution15();
print_r($obj->threeSum([-4,-2,-2,-2,0,1,2,2,2,3,3,4,4,6,6]));
