<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/19
 * Time: 4:04 下午
 * Desc:
 */

class Solution42
{

    //按照行去计算每行有多少个需要填充的块,会超时
    public function getResultByRow($num){

        if(count($num) <= 2){
            return 0;
        }
        $longest = max($num);
        $res = 0;
        $len = count($num);
        for($i = 1;$i <= $longest;$i ++){
            $min = -1;
            $max = -1;
            for($j = 0;$j < $len;$j++){
                if($num[$j] >= $i && $min == -1){
                    $min = $j;
                }if($num[$j] >= $i){
                    $max = $j;
                }
            }
            for(;$min <$max;$min++){
                if($num[$min] < $i){
                    $res ++;
                }
            }
        }
        return $res;
    }

    //根据该列左右两边是否有比该值更大的数，有点话就说明该列存在填充
    function getResultByCol($num)
    {
        $res = 0;
        $len = count($num);
        if($len <= 2){
            return $res;
        }
        for($i = 0 ;$i< $len;$i ++){
            if($i == 0 || $i == $len -1){
                continue;
            }
            $leftMax = $this->getMax($num,0,$i - 1);
            $rightMax = $this->getMax($num,$i + 1,$len - 1);
            if($leftMax > $num[$i] && $num[$i] < $rightMax){
                $res += min($leftMax,$rightMax) - $num[$i];
            }
        }
        return $res;
    }

    function getMax($arr,$left,$right)
    {
        return max(array_splice($arr,$left,$right-$left+1));
    }

    public function getResultByStack($num)
    {

    }

    public function getResultByMax($num)
    {
        if(count($num)<=2){
            return 0;
        }
        $max =$num[0];
        $list = [];
        $len = count($num);
        for($i = 0;$i<$len;$i++){
            if($num[$i] > $max){
                $max = $num[$i];
                $list = [$i];
            }elseif ($num[$i] == $max){
                $list[] = $i;
            }
        }
        $left = $list[0];
        $right = $list[count($list) - 1];
        $max = $num[$i];
        $res = 0;
        for($i = 0;$i<=$left;$i++){
            if($max >= $num[$i]){
                $res +=$max-$num[$i];
            }else{
                $max = $num[$i];
            }
        }
        $max = $num[$len - 1];
        for($i = $len - 1;$i >= $right ;$i --){
            if($max >= $num[$i]){
                $res +=$max-$num[$i];
            }else{
                $max = $num[$i];
            }
        }
        for($i = $left;$i<$right;$i++){
            $res += $num[$left] - $num[$i];
        }
        return $res;
    }


}

$obj = new Solution42();
echo $obj->getResultByMax([0,1,0,2,1,0,1,3,2,1,2,1]);

$redis = new Redis();
$redis->connect('127.0.0.1');
