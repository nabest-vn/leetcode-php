<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/19
 * Time: 3:29 下午
 * Desc:
 */

class Solution41
{
    public function firstMissingPositive($nums)
    {
        if(empty($nums)){
            return 1;
        }
        $res = '';
        $len = count($nums);
        //使用字符串里存储第n个数是否出现，
        for($i = 0; $i < $len;$i ++){
            $res .= '0';
        }
        for($i=0;$i < $len ;$i ++){
            //当大于0且小于等于数组长度时才记录为1
            if($nums[$i] > 0 && $nums[$i] <= $len){
                $res{$nums[$i] - 1} = '1';
            }
        }
        for($i = 0;$i< $len;$i++){
            //遍历发现不为1，就break；
            if($res{$i} != '1'){
                break;
            }
        }
        return $i + 1;
    }
}

$obj = new Solution41();
$nums = [1];
echo $obj->firstMissingPositive($nums);
