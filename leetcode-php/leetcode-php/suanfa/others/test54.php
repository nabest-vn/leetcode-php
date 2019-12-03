<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/12/3
 * Time: 12:47 下午
 * Desc:
 */


class Solution54
{

    public function spiralOrder($nums)
    {
        $col = count($nums);
        $row = count($nums[0]);
        $flag = 1;
        $min = min($col, $row);
        $res = [];
        if ($row == 1) {
            foreach ($nums as $item) {
                $res[] = $item[0];
            }
            return $res;
        }
        $target = ($col == $row) ? 2 * $min : 2 * $min + 1;
        while ($flag < $target) {
            $num = intval($flag / 4);
            switch ($flag % 4) {
                case 1:
                    for ($i = $num; $i <= $row - $num - 1; $i++) {
                        $res[] = $nums[$num][$i];
                    }
                    break;
                case 2:
                    for ($i = $num + 1; $i <= $col - $num - 1; $i++) {
                        $res[] = $nums[$i][$row - $num - 1];
                    }
                    break;
                case 3:
                    for ($i = $row - $num - 2; $i >= $num; $i--) {
                        $res[] = $nums[$col - $num - 1][$i];
                    }
                    break;
                case 0:
                    for ($i = $col - $num - 1; $i >= $num; $i--) {
                        $res[] = $nums[$i][$num - 1];
                    }
                    break;
            }
            $flag++;
        }
        return $res;
    }
}

$arr = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12]
];
$obj = new Solution54();
print_r($obj->spiralOrder($arr));