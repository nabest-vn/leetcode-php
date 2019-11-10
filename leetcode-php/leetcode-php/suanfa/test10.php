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

    }
}
$obj = new Solution10();
echo $obj->isMatch('aa','a*');