<?php
/**
 * Created by PhpstormProjects.
 * User: zyb
 * Date: 2019/11/12
 * Time: 12:29
 * Desc:
 */
include('test2.php');
class Solution19
{
    public function removeNthFromEnd($head, $n)
    {
        $first = new ListNode(0);
        $second = new ListNode(0);
        $first->next = $head;
        $second->next = $head;
        if($head->next == null){
            return null;
        }
        for($i=0;$i< $n + 1; $i ++){
            $first = $first->next;
            //printList($first);
            //printList($head);
        }
        while ($first != null){
            //printList($head);
            //printList($first);
          //  printList($second);
            $first = $first->next;
            $second = $second->next;
        }
        //printList($head);
        //printList($first);
        //printList($second);
        $second->next = $second->next->next;
        return $head;
    }

    public function getResult($arrInput){

    }
}
$l1 = new ListNode(1);
$l1->next = new ListNode(2);
$l1->next->next = new ListNode(3);
$l1->next->next->next = new ListNode(4);
$obj = new Solution19();
$res = $obj->removeNthFromEnd($l1, 2);
//$l1 = $res;
printList($res);

function printList($l)
{
    echo '[';
    while ($l != null){
        echo $l->val.',';
        $l = $l->next;
    }
    echo "]\n";
}

