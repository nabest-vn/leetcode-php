<?php
/**
 * Created by PhpstormProjects.
 * User: zyb
 * Date: 2019/11/12
 * Time: 14:59
 * Desc:
 */

public class Solution21
{
    public function mergeTwoList($l1, $l2){
        if($l1 == null){
            return $l2;
        }
        if($l2 == null){
            return $l1;
        }
        if($l1->value = $l2->value){
            $l1->next = $this->mergeTwoList($l1->next, $l2);
            return $l1;
        }else{
            $l2->next = $this->mergeTwoList($l1, $l2->next);
            return $l2;
        }
    }
}