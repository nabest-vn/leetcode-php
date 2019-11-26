<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/26
 * Time: 2:54 下午
 * Desc:
 */

class Solution49
{
    public function groupAnagrams($strs)
    {
        $res = [];
        if(empty($strs)){
            return [[]];
        }
        foreach ($strs as $str){
            $temp = $str;
            $len = strlen($str);
            for($j = $len - 1;$j >= 1;$j --){
                for($i = 1;$i <= $j;$i ++){
                    if($str{$i} < $str{$i - 1}){
                        $char = $str{$i};
                        $str{$i} = $str{$i - 1};
                        $str{$i - 1} = $char;
                    }
                }
            }
            //echo $temp. " " . $str ."\n";
            $res[$str][] = $temp;
        }
        return $res;
    }
}


$obj = new Solution49();
print_r($obj->groupAnagrams(["eat", "tea", "tan", "ate", "nat", "bat"]));