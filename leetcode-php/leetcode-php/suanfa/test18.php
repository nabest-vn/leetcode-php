<?php
/**
 * Created by PhpstormProjects.
 * User: zyb
 * Date: 2019/11/12
 * Time: 11:37
 * Desc:
 */
class Solution18
{
    public function fourSum($nums, $target)
    {
        $res =[];
        $len = count($nums);
        if($len <= 3){
            return $res;
        }
        sort($nums);
        $first = 0;
        while ($first < $len - 3){
            $second = $first + 1;
            while ($second < $len - 2){
                $third = $second + 1;
                $last = $len - 1;
                while ($third < $last){
                    $sum = $nums[$first] + $nums[$second] + $nums[$third] + $nums[$last];
                    if($sum == $target){
                        $res[] = [$nums[$first], $nums[$second], $nums[$third], $nums[$last]];
                    }
                    if($sum < $target){
                        $third ++;
                        while ($nums[$third - 1] == $nums[$third] && $third < $last){
                            $third ++;
                        }
                    }elseif($sum >= $target){
                        $last --;
                        while ($nums[$last] == $nums[$last + 1] && $third < $last){
                            $last --;
                        }
                    }
                }
                $second ++;
            }
            $first ++;
        }
        return array_unique($res, SORT_REGULAR);
    }
}
$obj = new Solution18();
print_r($obj->fourSum([0,0,0,0],0));
