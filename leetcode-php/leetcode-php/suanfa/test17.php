<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/12
 * Time: 9:25 上午
 */

class Solution17
{
    public function letterCombinations($digits)
    {
        $digits = strval($digits);
        if(! preg_match('/^[2-9]+$/', $digits)){
            return [];
        }
        $res = [""];
        $len = strlen($digits);
        $i = 0;
        while ($i < $len){
            $res = $this->getArray($digits{$i}, $res);
            $i ++;
        }
        return $res;
    }
    function getArray($num, $arr)
    {
        $map = [
            2=>['a','b','c'],
            3=>['d','e','f'],
            4=>['g','h','i'],
            5=>['j','k','l'],
            6=>['m','n','o'],
            7=>['p','q','r','s'],
            8=>['t','u','v'],
            9=>['w','x','y','z']
        ];
        $res = [];
        foreach ($map[intval($num)] as $item){
            foreach ($arr as $str){
                $res[] = $str . $item;
            }
        }
        return $res;
    }
}
$obj = new Solution17();
print_r($obj->letterCombinations(234));