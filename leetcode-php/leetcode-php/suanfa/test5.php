<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/10
 * Time: 11:40 上午
 */

class Solution5
{
    public $list = [];

    public function longestPalindrome($str)
    {
        $list = [];
        $this->setList($str,$list);
        if(empty($list)){
            return "";
        }
        $max = "";
        foreach ($list as $s){
            if(strlen($s) > strlen($max)){
                $max = $s;
            }
        }
        return $max;
    }

    private function setList($s, &$list)
    {
        $len = strlen($s);
        for($j = 1;$j <= $len; $j ++){
            $str = substr($s, 0, $j);
            for($i = 0;$i < $j;$i ++){
                if(substr($str, $i, $len - $i) == strrev(substr($str, $i, $len - $i))) {
                    $list[] = substr($str, $i, $len - $i);
                    break;
                }
            }
        }
    }

}
$obj = new Solution5();
echo $obj->longestPalindrome("babaddtattarrattatddetartrateedredividerb") ."\n";

