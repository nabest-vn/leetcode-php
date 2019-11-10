<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/10
 * Time: 1:39 下午
 */

class Solution10 {

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p) {
//        $pattern = '/^' . $p . "$/";
//        echo $pattern;
//        return preg_match($pattern, $s);

        $l1 = strlen($s);
        $l2 = strlen($p);
        //如果s还有剩余，p已经没有了
        if($l1 != 0 && $l2 == 0){
            return false;
        }
        //s没有已经没有了
        if($l1 == 0){
            //如果p剩下的是奇数个，返回false
            if($l2 % 2 == 1){
                return false;
            }
            $i = 1;
            while ($i < $l2 && $p{$i} == '*'){
                $i += 2;
            }
            //如果只剩下x*这种的就返回true
            if($i == $l2 + 1){
                return true;
            }
            //否则返回false
            return false;
        }
        //如果s的最后一位不等于p的最后一位，而且p的最后一位不是.
        if($s{$l1 - 1} == $p{$l2 - 1} || $p{$l2 - 1} == '.'){
            return $this->isMatch(substr($s, 0, $l1 -1), substr($p, 0, $l2 - 1));
        }
        //如果p的最后一位是*
        if($p{$l2 - 1} == '*'){
            //如果s的最后一位不等于p的倒数第二位，且不等于.，则认为*代表的个数为0
            if($s{$l1 - 1} != $p{$l2 - 2} && $p{$l2 - 2} != '.'){
                return $this->isMatch($s, substr($p, 0, $l2 -2));
            }
            //否则从以下几种情况下选择一个
            //1。去除s的最后一位，再与p进行比较
            //2。将s与去除p的最后两位的数字进行
            return $this->isMatch(substr($s, 0, $l1 - 1), $p) ||
                $this->isMatch($s, substr($p, 0, $l2 - 2));
        }
        return false;
    }
}
$obj = new Solution10();
echo $obj->isMatch('aa','a*');