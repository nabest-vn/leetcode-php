<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/13
 * Time: 9:38 上午
 */

class Solution22
{
    public function generateParenthesis($n){
        if($n == 1){
            return ['()'];
        }
        $last = $this->generateParenthesis($n - 1);
        $res = [];
        foreach($last as $item){
            $res[] = '('.$item.')';
            for($i = 0;$i < 2*$n -1;$i++){
                $res[] = substr($item,0,$i) . '()' . substr($item,$i,2 *$n - 2 -$i);
            }
        }
        return array_unique($res);
    }
}
$obj = new Solution22();
print_r($obj->generateParenthesis(4));