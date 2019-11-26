<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/25
 * Time: 8:44 下午
 * Desc:
 */

class Solution47
{
    /**
     * @param $nums
     * @return array
     * @desc 使用回溯法，每次使用后都删除数据，直到数据使用完，将结果添加到结果集，接着循环
     */
    public function permute($nums)
    {
        if(count($nums) <= 1){
            return [$nums];
        }
        $res = [];
        $len = count($nums);
        $this->addResult($res,$nums,[],$len);
        //print_r($res);
        $res = array_unique($res,SORT_REGULAR);
        return $res;
    }

    public function addResult(&$res, $nums, $current, $index)
    {
        $len = count($nums);
        for($i = 0;$i< $len;$i ++){
            //注意：这里需要使用全等，为了避免$nums[$i]=0，0和null使用==是相等的
            if($nums[$i] === null){
                continue;
            }
            $current[] = $nums[$i];
            $index --;
            $flag = $nums[$i];
            $nums[$i] = null;
            if($index == 0){
                $res[] = $current;
                return;
            }
            $this->addResult($res, $nums, $current,$index);
            $nums[$i] = $flag;
            $index ++;
            array_pop($current);
        }
    }
}

$obj = new Solution47();
print_r($obj->permute([1,1,2]));