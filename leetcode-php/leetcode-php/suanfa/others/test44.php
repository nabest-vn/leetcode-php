<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/25
 * Time: 7:21 下午
 * Desc:
 */

class Solution44
{
    public function isMatch($s, $p)
    {
        if($s == $p){
            return true;
        }
        if($s == ""){
            if(str_replace('*','',$p) == ""){
                return true;
            }
            return false;
        }
        if($s != "" && $p == ""){
            return false;
        }else{
            $sEnd = $s{strlen($s) - 1};
            $pEnd = $p{strlen($p) - 1};
            if($pEnd != "*" && $pEnd != "?"){
                if($sEnd != $pEnd){
                    return false;
                }
                return $this->isMatch(substr($s,0,-1),substr($p,0,-1));
            }elseif ($pEnd == '?'){
                return $this->isMatch(substr($s,0,-1),substr($p,0,-1));
            }else{
                return $this->isMatch($s,substr($p,0,-1)) ||
                    $this->isMatch(substr($s, 0 , -1),$p);
            }
        }
    }
}

$obj = new Solution44();
echo $obj->isMatch("bbbbababbabbbbabbbbaabaaabbbbabbbababbbbababaabbbab",'a**b');
//echo substr('123456',0,-1);
