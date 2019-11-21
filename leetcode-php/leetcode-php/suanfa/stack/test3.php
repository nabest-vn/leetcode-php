<?php
/**
 * Created by PhpStorm.
 * User: 陈哲
 * Date: 2019/11/7
 * Time: 7:42
 */

/*
 * 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。
 */

class Solution3{


    /**
     * @param $s
     * @return int|mixed
     * o(n2)的时间复杂度
     */
    public function lengthOfLongestSubString($s)
    {
        $len = strlen($s);
        if($len <=0){
            return 0;
        }
        if($len == 1){
            return 1;
        }
        $temp = [];
        for($i=0;$i<$len;$i++){
            $temp[] = $s{$len - $i -1};
            if(count($temp) != count(array_unique($temp))){
                break;
            }
        }
        return max($this->lengthOfLongestSubString(substr($s, 0, $len -1)),count(array_unique($temp)));
    }


    /**
     * @param $s
     * @return int|mixed
     * @desc 使用队列来存储不重复的子串，每次比较都更新最大值，如果遇到重复的字串，
     * 则把重复的字母之前的所有字母都给去掉
     */
    public function maxlength($s)
    {
        $len = strlen($s);
        //用于记录最大值
        $max = 0;
        //str为空
        if($len <= 0) {
            return 0;
        }

        $set = [];
        $index =0;
        while($index < $len){
            if(!in_array($s{$index}, $set)){
                $set[$index] = $s{$index};
                $max = max($max, count($set));
            }else {
                $set[$index] = $s{$index};
                $cur_index = array_search($set[$index], $set);
                $set = array_slice($set, $cur_index-$index, $index - $cur_index, true);
            }
            $index ++;
        }
        return $max;
    }
}

$obj = new Solution3();
echo $obj->maxlength("eeydgwdykpv");

$array = Array
(
    1=> 'e',
    2=> 'y',
    3=> 'd',
    4=> 'g',
    5=> 'w',
    6=> 'd',
);
print_r(array_slice($array,4,3,true));
$test = array(2=>'e',3=>'e');
print_r(array_slice($test,1,1,true));
