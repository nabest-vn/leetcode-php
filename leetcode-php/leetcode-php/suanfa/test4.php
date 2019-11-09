<?php
/**
 * Created by leetcode.
 * User: zyb
 * Date: 2019/11/7
 * Time: 15:25
 * Desc:求两个有序数组的中位数
 */

class Solution4
{


    public function getResult($n1,$n2){
        $l1 = count($n1);
        $l2 = count($n2);
        if($l1 > $l2){
            return $this->getResult(n2,n1);
        }

    }


    //使用数组获取到
    public function getMedian($nums1,$nums2){
        $len1 = count($nums1);
        $len2 = count($nums2);
        if($len1 > $len2){
            return $this->getMedian($nums2,$nums1);
        }
        $iMin = 0;
        $iMax = $len1;
        while($iMin <= $iMax){
            $i = intval(($iMin + $iMax)/2);
            $j = intval(($len1 + $len2 +1 ) /2 -$i);
            if($j != 0 && $i != $len1 && $nums2[$j -1] > $nums1[$i]){
                $iMin = $i + 1;
            }elseif ($i != 0 && $j != $len2 && $nums1[$i -1] > $nums2[$j]){
                $iMax = $i -1;
            }else{
                $maxLeft = 0;
                if($i == 0){
                    $maxLeft = $nums2[$j -1];
                }elseif ($j == 0){
                    $maxLeft = $nums1[$i -1];
                }else{
                    $maxLeft = max($nums1[$i -1],$nums2[$j -1]);
                }
                if(($len1 + $len2) %2 == 1){
                    return $maxLeft;
                }
                $minRight = 0;
                if($i == $len1){
                    $minRight = $nums2[$j];
                }elseif ($j == $len2){
                    $minRight = $nums1[$i];
                }else{
                    $minRight = min($nums1[$i],$nums2[$j]);
                }
                return ($maxLeft + $minRight) / 2;
            }
        }
        return 0.0;
    }

    public function findMedianSortedArrays($array1, $array2)
    {
        $left = intval((count($array1) + 1 + count($array2)) /2);
        $right = intval((count($array1) + 2 + count($array2)) /2);
        //忽略总个数是单双，如果是单数则求两边再除以二
        return ($this->getKth($array1, 0,count($array1) - 1,$array2,0,count($array2) - 1,$left) +
            $this->getKth($array1,0,count($array1) - 1,$array2,0,count($array2) -1,$right)) / 2;
    }
    private function getKth($array1,$start1,$end1,$array2,$start2,$end2,$k)
    {
        $len1 = $end1 - $start1 + 1;
        $len2 = $end2 - $start2 + 1;
        //保证len1要小于等于len2
        if($len1 > $len2){
            return $this->getKth($array2,$start2,$end2,$array1,$start1,$end1,$k);
        }
        //len1先为0怎返回$array2中的数
        if($len1 == 0){
            return $array2[$start2 + $k - 1];
        }
        //如果只有一个，则返回最小的那个
        if($k == 1){
            return min($array1[$start1],$array2[$start2]);
        }
        //对k/2和数组的长度取最小值，如果k/2大于len则使用len作为要处理的数
        $i = $start1 + min($len1, intval($k/2)) -1;
        $j = $start2 + min($len2, intval($k/2)) -1;
        //如果arr1的值大于arr2的值，则去掉arr2中的数否则去掉arr1中的数
        if($array1[$i] > $array2[$j]){
            return $this->getKth($array1,$start1,$end1,$array2,$j+1,$end2,$k - ($j + 1 -$start2));
        }else{
            return $this->getKth($array1,$i +1,$end1,$array2,$start2,$end2,$k -($i+1-$start1));
        }
    }
}