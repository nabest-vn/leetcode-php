<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/11
 * Time: 9:43 上午
 */

class Solution14
{
    public function longestCommonPrefix($strs)
    {
        if(empty($strs)){
            return '';
        }
        $common = $strs[0];
        foreach ($strs as $str) {
            $i = 0;
            while ($i < strlen($str) && $i < strlen($common)){
                echo "strs:".$str{$i}. " common:". $common{$i} ."\n";
                if($str{$i} == $common{$i}){
                    $i ++;
                    continue;
                }
                break;
            }
            $len = strlen($common);
            echo $common ."\n";
            $common = substr($common,0,min($len,$i,count($str)));
            if($common == ""){
                break;
            }
        }
        return $common;
    }
}
$obj = new Solution14();
echo $obj->longestCommonPrefix(['flower','flow', 'flight']);