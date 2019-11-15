<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/15
 * Time: 5:05 下午
 */

class Solution27
{
    public function removeElement(&$nums,$val)
    {
        $res = $len = count($nums);
        for($i = 0;$i< $len; $i ++){
            if($nums[$i] == $val){
                unset($nums[$i]);
                $res --;
            }
        }
        return $res;
    }
}

$obj = new Solution27();
$arr = [3,2,2,3];
echo $obj->removeElement($arr, 3);
print_r($arr);
