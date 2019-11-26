<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/25
 * Time: 8:00 下午
 * Desc:
 */

class Solution45
{

    public function jump($num)
    {
        $len = count($num);
        if($len <= 1){
            return 0;
        }
        $count = 0;
        $current = 0;
        while ($current < $len - 1){
            if($current + $num[$current] >= $len - 1){
                $count ++;
                break;
            }
            $max = 0;
            $flag = 0;
            echo $current. " ". ($current+$num[$current]) ."\n";
            for($i = $current + 1;$i <= $current + $num[$current];$i++){
                if($i + $num[$i] > $max){
                    $flag = $i;
                    $max = $i + $num[$i];
                }
            }
            $current = $flag;
            echo $current. "\n";
            $count ++;
        }
        return $count;
    }
}

$obj = new Solution45();
echo $obj->jump([2,2,1,1,1]);
