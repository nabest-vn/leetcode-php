<?php
/**
 * Created by PhpstormProjects.
 * User: zyb
 * Date: 2019/11/12
 * Time: 14:49
 * Desc:
 */

class Solution20
{
    public function isValid($s)
    {
        while ($s != ""){
            $len = strlen($s);
            $s = str_replace('()', '', $s);
            $s = str_replace('{}', '', $s);
            $s = str_replace('[]', '', $s);
            if($len == strlen($s)){
                return false;
            }
        }
        return true;
    }
}