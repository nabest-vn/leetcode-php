<?php
/**
 * Created by leetcode.
 * User: zyb
 * Date: 2019/11/6
 * Time: 20:16
 * Desc:
 */

class Solution2
{

    function addTwoNumbers($l1, $l2)
    {
        if($l1 == null || $l2 == null){
            return false;
        }
        $first = null;
        $node = null;
        $n = 0;
        $temp = 0;
        while($l1 != null || $l2 != null || $temp != 0){
            $sum = 0;
            $sum +=$temp;
            if($l1 != null){
                $sum += $l1->val;
                $l1 = $l1->next;
            }
            if($l2 != null){
                $sum += $l2->val;
                $l2 = $l2->next;
            }
            $temp = intval($sum / 10);

            if($n == 0){
                $node = new ListNode(intval($sum % 10));
                $first = $node;
            }else{
                $node->next = new ListNode(intval($sum % 10));
                $node = $node->next;
            }
            $n++;
        }
    }
}


//链表
class ListNode
{
    public $val = 0;
    public $next = null;

    /*
     * 构造函数
     */
    public function __construct($val)
    {
        $this->val = $val;
    }


}