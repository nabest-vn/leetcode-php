<?php
/**
 * Created by PhpstormProjects.
 * User: zyb
 * Date: 2019/11/12
 * Time: 14:59
 * Desc:
 */
include('test2.php');
class Solution21
{
    public function mergeTwoLists($l1, $l2){
        if($l1 == null){
            return $l2;
        }
        if($l2 == null){
            return $l1;
        }
        if($l1->val <= $l2->val){
            //echo $l1->val;
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        }else{
            //echo $l2->val;
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }
}
$l1 = new ListNode(1);
$l1->next = new ListNode(2);
$l1->next->next = new ListNode(4);

$l2 = new ListNode(1);
$l2->next = new ListNode(3);
$l2->next->next = new ListNode(4);
echo $l2->next->val;
$obj = new Solution21();
$obj->mergeTwoLists($l1, $l2);

$l3 = $l2;
if($l3 === $l2){
    echo "11";
}