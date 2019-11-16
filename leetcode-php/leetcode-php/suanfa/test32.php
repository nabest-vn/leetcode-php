<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/16
 * Time: 11:09 上午
 */

class Solution32
{

    /*
     *
     * Desc:从左向右遍历，如果遇到(的次数等于)的次数则更新最大值
     * 如果遇到)的次数多于(的次数则从当前重新遍历
     * 右往左再遍历一遍，更新最大值
     */
    public function longestValidParentheses($s)
    {
        $len = strlen($s);
        $left = 0;
        $right = 0;
        $max = 0;
        for($i =0; $i < $len ; $i ++){
            if($s{$i} == '('){
                $left ++;
            }else{
                $right ++;
            }
            if($left == $right){
                $max = max($max, 2 * $right);
            }elseif ($left < $right){
                $left = 0;
                $right = 0;
            }
        }
        $left = 0;
        $right = 0;
        for($i = $len - 1; $i >=0;$i--){
            if($s{$i} == '('){
                $left ++;
            }else{
                $right ++;
            }
            if($left == $right){
                $max = max($max, 2 * $right);
            }elseif ($left > $right){
                $right = 0;
                $left = 0;
            }
        }
        return $max;
    }

    /*
     * Desc: 利用堆栈进行操作，
     * 起始时，放到堆栈里-1，如果遇到了（则将当前的index放到数组里，如果遇到）则从栈中取出一个index，
     * 如果取出后堆栈中还有数据，则更新最大值，继续操作，如果没有数据了，则将当前index放入堆栈中，
     * 不需要更新最大值
     */
    public function getResult($s){
        $stack = [-1];
        $max = 0;
        $len = strlen($s);
        for($i = 0; $i < $len; $i ++){
            if($s{$i} == '('){
                $stack[] = $i;
            }else{
                array_pop($stack);
                if(count($stack) == 0){
                    $stack[] = $i;
                }else{
                    $max = max($max, ($i - $stack[count($stack) - 1]));
                }
            }
        }
        return $max;
    }

}
$obj = new Solution32();
echo $obj->longestValidParentheses("(()((((");
echo $obj->getResult(")()())");