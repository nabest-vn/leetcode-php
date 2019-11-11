<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/11
 * Time: 9:14 上午
 */

class Solution13
{
    public function romanToInt($s)
    {
        $s = trim(strval($s));
        if($s == "" || !preg_match("/^[IVXLCDM]+$/", $s)){
            return 0;
        }
        $count = 0;
        $i = 0;
        while ($i < strlen($s) - 1){
            $str = substr($s, $i, 2);
            $flag = true;
            switch ($str) {
                case 'CM':
                    $count += 900;
                    break;
                case 'CD':
                    $count += 400;
                    break;
                case 'XC':
                    $count += 90;
                    break;
                case 'XL':
                    $count += 40;
                    break;
                case 'IX':
                    $count += 9;
                    break;
                case 'IV':
                    $count += 4;
                    break;
                default:
                    $flag = false;
            }
            if($flag){
                $s = str_replace($str, '', $s);
            }else{
                $i ++;
            }
        }
        $arr = ['I' => 0,
            'V' => 0,
            'X' => 0,
            'L' => 0,
            'C' => 0,
            'D' => 0,
            'M' => 0,
        ];
        for($j =0; $j < strlen($s); $j ++){
            echo
            $arr[$s{$j}] ++;
        }
        print_r($arr);
        $count += 1000* $arr['M'] + 500 * $arr['D'] + 100 * $arr['C'] + 50 * $arr['L'] + 10 * $arr['X'] + 5 * $arr['V'] + $arr['I'];
        return $count;
    }
}
$obj = new Solution13();
echo $obj->romanToInt('III');