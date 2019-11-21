<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/17
 * Time: 11:08 上午
 */

class Solution36
{

    /**
     * @param $nums
     * @return bool
     * @desc 是否是一个有效的数组，通过遍历整个数组来破解是否是一个有效的数独
     */
    public function isValidSudoku($nums)
    {
        for($i = 0;$i<9; $i++){
            $res = [];
            for($j=0;$j < 9; $j ++){
                if($nums[$i][$j] != '.'){
                    $res[] = $nums[$i][$j];
                }
            }
            if(count($res) != count(array_unique($res))){
                return false;
            }
        }
        for($i = 0; $i < 9; $i ++){
            $res = [];
            for($j =0;$j<9; $j ++){
                if($nums[$j][$i] != '.'){
                    $res[] = $nums[$j][$i];
                }
            }
            if(count($res) != count(array_unique($res))){
                return false;
            }
        }
        for($i=0;$i<9;$i +=3){
            for($m=0;$m<9;$m+=3){
                $res = [];
                for($j=0;$j<3;$j++){
                    for($n=0;$n<3;$n ++){
                        if($nums[$i+$j][$m+$n] != '.'){
                            $res[] = $nums[$i+$j][$m+$n];
                        }
                    }
                }
                if(count($res) != count(array_unique($res))){
                    return false;
                }
            }
        }
        return true;
    }

}