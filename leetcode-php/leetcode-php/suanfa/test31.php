<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/15
 * Time: 8:39 下午
 * Desc:如果存在更大的数，那么这个数的最小值就是将后面连续增加的数反序，然后从这里
 * 面去一个最小的大于前面的那个数的最小的数，交换位置，就是下一个数
 * 如：1，3，2，1下一个最小的数局势2，1，1，3就是先排序为1，1，2，3，然后将1和2交换位置
 * 变为2，1，1，3
 */

class Solution31
{
    public function nextPermutation(&$nums)
    {
        if(count($nums) <= 1){
            return;
        }
        $len = count($nums);
        $j = $len - 1;
        while($j > 0){
            if($nums[$j] > $nums[$j - 1]){
                break;
            }
            $j --;
        }
        //echo "j:".$j."\n";
        $this->sortArrayByItem($nums,$j,count($nums) - 1);
        if($j == 0){
            return;
        }
        $index = $j - 1;
        //echo "index".$index . "\n";
        for(; $j <= $len - 1; $j++){
            if($nums[$index] < $nums[$j]){
                //echo '$j' . $j .'\n';
                $temp = $nums[$index];
                $nums[$index] = $nums[$j];
                $nums[$j] = $temp;
                return;
            }
        }
    }

    public function sortArrayByItem(&$num,$start,$end)
    {
        if(count($num) <= $end || $start < 0 || $start > $end){
            return false;
        }
        while($start < $end){
            $i = $start;
            while($i < $end){
                if($num[$i] > $num[$i + 1]){
                    $temp = $num[$i];
                    $num[$i] = $num[$i + 1];
                    $num[$i + 1] = $temp;
                }
                $i ++;
            }
            $end --;
        }
    }
}

$obj = new Solution31();
$arr = [1,2,3];
$obj->nextPermutation($arr);
print_r($arr);
$obj->nextPermutation($arr);
print_r($arr);
$obj->nextPermutation($arr);
print_r($arr);
$obj->nextPermutation($arr);
print_r($arr);
$obj->nextPermutation($arr);
print_r($arr);
$obj->nextPermutation($arr);
print_r($arr);

$arr = [3,2,1,0];
$obj->sortArrayByItem($arr,0,3);
print_r($arr);
