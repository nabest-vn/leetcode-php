<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/19
 * Time: 12:08 下午
 * Desc:
 */

class Solution40
{
    public function combinationSum2($candidates, $target)
    {
        $res = [];
        if(empty($candidates)){
            return $res;
        }
        $this->addResultToArray($res,$candidates,$target,[]);
        return $res;
    }


    private function addResultToArray(&$res, $candidates,$target,$current)
    {
        if($target < 0){
            return;
        }elseif ($target == 0){
            //print_r($current);
            if(count($current) == 1){
                if(!in_array($current,$res)){
                    $res[] = $current;
                }
                return;
            }
            sort($current);
            if(!in_array($current,$res)){
                $res[] = $current;
            }
            return;
        }
        $len = count($candidates);
        for($i = 0;$i<$len;$i++){
            //echo $i . "\n";
            if($candidates[$i] > $target){
                continue;
            }
            $current[] = $candidates[$i];
            $deleted = $candidates[$i];
            $target = $target - $candidates[$i];
            array_splice($candidates,$i,1);
            $this->addResultToArray($res,$candidates,$target,$current);
            array_splice($candidates,$i, 0, $deleted);
            $target = $target + $deleted;
            array_pop($current);
        }
    }
}
$obj = new Solution40();
$arr = [1,2,3,4,5,6,7,8];
print_r($obj->combinationSum2($arr, 8));