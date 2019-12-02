<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/27
 * Time: 10:49 上午
 * Desc:
 */

class Solution51
{
    public function solveNQueens($n)
    {
        if($n == 0){
            return false;
        }
        $res = [];
        $arr = [];
        for($i=0;$i<$n;$i++){
            for($j= 0;$j < $n;$j++){
                $arr[$i] .= '.';
            }
        }
        $this->addResult($res, $arr, 0, $n);
        return $res;
    }

    private function addResult(&$res, $arr, $col, $n)
    {
        if($col == $n){
            $res[] = $arr;
        }
        for($j = 0;$j < $n;$j ++){
            for($i = 0;$i < $col;$i ++) {
                if ($arr[$i]{$j} == 'Q') {
                    continue 2;
                }
                if ($arr[$i]{$j - $col + $i} == 'Q' && $j - $col + $i > -1) {
                    continue 2;
                }
                if ($arr[$i]{$j + $col - $i} == 'Q' && $j + $col - $i < $n) {
                    continue 2;
                }
            }
            $arr[$col]{$j} = 'Q';
            $col ++;
            $this->addResult($res, $arr, $col, $n);
            $col --;
            $arr[$col]{$j} = '.';
        }
    }
}

$obj = new Solution51();
print_r($obj->solveNQueens(4));

$str = '123';