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

    public function getResultByDynamic($num)
    {
        if(count($num) <= 2){
            return 0;
        }
        $len = count($num);
        $leftMax = [0];
        $rightMax[$len - 1] = 0;
        for($i=1;$i<$len;$i ++){
            $leftMax[] = max($num[$i - 1], $leftMax[$i - 1]);
        }
        for($i = $len -2;$i>=0;$i--){
            $rightMax[$i] = max($num[$i + 1], $rightMax[$i + 1]);
        }

        $res = 0;
        for($i = 1;$i < $len - 1;$i ++){
            $min = min($leftMax[$i],$rightMax[$i]);
            if($num[$i] < $min){
                $res += $min - $num[$i];
            }
        }
        return $res;
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
echo $obj->getResultByDynamic([0,1,0,2,1,0,1,3,2,1,2,1]);
