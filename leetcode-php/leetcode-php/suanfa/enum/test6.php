<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/10
 * Time: 12:44 下午
 */

class Solution6
{

    public function convert($s, $numRows){
        if($s == "" || $numRows == 1){
            return $s;
        }
        $res = [[]];
        $len = strlen($s);
        $i = $j = 0;
        $flag = true;
        while($i < $len){
            $res[$j][]  = $s{$i};
            $i ++;
            if($j == 0 && !$flag){
                $flag = true;
                $j ++;
            }elseif ($j == $numRows -1 && $flag){
                $flag = false;
                $j --;
            }elseif ($flag){
                $j ++;
            }else{
                $j --;
            }
        }
        $str = "";
        foreach ($res as $row){
            foreach ($row as $item) {
                $str .= strval($item);
            }
        }
        return $str;
    }

}

$obj = new Solution6();
echo $obj->convert("LEETCODEISHIRING", 3);