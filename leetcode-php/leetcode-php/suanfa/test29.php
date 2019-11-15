<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/15
 * Time: 5:41 下午
 */

class Solution29
{

    /**
     * @param $divided :除数
     * @param $divisor :被除数
     * @return bool|float|int
     * @desc: 利用左右移动被除数
     */
    public function divide($divided, $divisor)
    {
        //输入不合法返回false
        if($divisor == 0 || min($divided,$divisor) < -pow(2,31) ||
            max($divisor,$divided) >= pow(2,31)){
            return false;
        }
        //溢出的处理，其余的情况不会溢出
        if($divided == -pow(2,31) && $divisor == -1){
            return pow(2,31) - 1;
        }
        //正负号单独拿出来
        $flag = (($divisor > 0 && $divided > 0) || ($divided < 0 && $divisor < 0)) ? 1 : -1;
        $count = 0;
        //只处理绝对值
        $divisor = abs($divisor);
        $divided = abs($divided);
        //将被除数左移，记录左移次数
        while($divisor <= $divided >> 1){
            $divisor = $divisor << 1;
            $count ++;
        }
        $res = '';
        //按照左移的次数，一次一次的右移回去，用res记录二进制的值
        while($count >= 0){
            if($divided >= $divisor){
                $res .= '1';
                $divided -= $divisor;
            }else{
                $res .= '0';
            }
            echo $divided . " " . $divisor . " " . $res . "\n";
            $count --;
            $divisor = $divisor >> 1;
        }
        //将二进制转化成10进制
        $res = base_convert($res, 2, 10);
        return $flag * $res;
    }
}

$obj = new Solution29();
echo $obj->divide(7,3);
