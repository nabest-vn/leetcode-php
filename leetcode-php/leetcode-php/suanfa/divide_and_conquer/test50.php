<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/26
 * Time: 4:46 下午
 * Desc:
 */

class Solution50
{
    public function myPow($x, $n)
    {
        //echo $x ." " . $n . "\n";
        if($n == 0 && $x == 0){
            return false;
        }elseif ($n == 0 && $x != 0){
            return 1;
        }elseif ($x == 0){
            return 0;
        }elseif($n == 1){
            return $x;
        }elseif ($n == -1){
            return 1 / $x;
        }
        $half = $this->myPow($x, intval($n / 2));
        return $half* $half * $this->myPow($x, $n % 2);
    }
}

$obj = new Solution50();
echo $obj->myPow(2.0,2147483647);