<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/19
 * Time: 10:48 上午
 * Desc:
 */

class Solution39
{
    public function combinationSum($candidate, $target)
    {
        $res = [];
        if(empty($candidate)){
            return $res;
        }
        $this->addResultToArray($res, $candidate, $target, []);
        return array_unique($res, SORT_REGULAR);
    }

    private function addResultToArray(&$arr, $candidate, $target, $current){
        if($target < 0){
            return ;
        }elseif ($target == 0){
            //print_r($arr);
            if(count($current) == 1){
                $arr[] = $current;
            }
            sort($current);
            if(!(in_array($current, $arr))){
                $arr[] = $current;
            }
            return;
        }
        $len = count($candidate);
        for($i = 0;$i< $len;$i++){
            $target = $target - $candidate[$i];
            $current[] = $candidate[$i];
            $this->addResultToArray($arr,$candidate,$target,$current);
            $target = $target + $candidate[$i];
            array_pop($current);
        }
    }
}
$obj = new Solution39();
$arr = [2,3,5];
print_r($obj->combinationSum($arr, 8));