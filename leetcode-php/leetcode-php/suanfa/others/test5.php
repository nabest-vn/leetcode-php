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

    //把每次的操作结果放到数组list中，第一层for循环表示的是以️第j位为结尾的对称的回文字符串的可能，
    //然后利用利用第二层for循环来查找开始的位置，找到了就放到list中
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

