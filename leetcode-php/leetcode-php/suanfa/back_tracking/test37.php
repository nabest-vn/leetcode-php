<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/11/18
 * Time: 2:53 下午
 */

class Solution37
{
    public function solveSudoku(&$nums)
    {
        //rowUsed表示某行数字i是否使用过，col表示列，box表示3*3的小方格内
        $rowUsed = [];
        $colUsed = [];
        $boxUsed = [];
        //全部初始化为false
        for($i=0;$i<9;$i++){
            for($j=0;$j<10;$j++){
                $rowUsed[$i][$j] = false;
                $colUsed[$i][$j] = false;
                $boxUsed[$i%3][intval($i / 3)][] = false;
            }
        }
        //把出现的数字更新为true
        for($row = 0;$row < 9; $row ++){
            for($col = 0;$col < 9;$col ++){
                if($nums[$row][$col] != '.'){
                    $rowUsed[$row][$nums[$row][$col]] = true;
                    $colUsed[$col][$nums[$row][$col]] = true;
                    $boxUsed[intval($row / 3)][intval($col / 3)][$nums[$row][$col]] = true;
                }
            }
        }

        //从0，0开始填充
        $this->recusiveSolveSudoku($nums,$rowUsed,$colUsed,$boxUsed,0,0);
    }

    public function recusiveSolveSudoku(&$nums,&$rowUsed,&$colUsed,&$boxUsed,$row,$col)
    {
        //如果该行填充完了，则进行下一行，如果都遍历完了，返回true
        if($col == 9){
            $col = 0;
            $row ++;
            if($row == 9){
                return true;
            }
        }

        //如果当前字符为'.'，则从1-9中找出可以填充的数字
        if($nums[$row][$col] == '.'){
            for($i = 1;$i <=9; $i ++){
                //如果3个数组中的i对应的值都是false，则将i对应的在3个数组中的对应值改为true，向下遍历

                if(!($rowUsed[$row][$i] || $colUsed[$col][$i] ||
                    $boxUsed[intval($row/3)][intval($col/3)][$i])){
                    $rowUsed[$row][$i] = true;
                    $colUsed[$col][$i] = true;
                    $boxUsed[intval($row / 3)][intval($col / 3)][$i] = true;
                    $nums[$row][$col] = $i;

                    if($this->recusiveSolveSudoku($nums,$rowUsed,$colUsed,$boxUsed,$row,$col + 1)){
                        return true;
                    }

                    //如果上面的被推翻了，则回溯，即回复原先值，再继续遍历
                    $rowUsed[$row][$i] = false;
                    $colUsed[$col][$i] = false;
                    $boxUsed[intval($row / 3)][intval($col / 3)][$i] = false;
                    $nums[$row][$col] = '.';
                }
            }
            //如果是数字，继续遍历
        }else{
            return $this->recusiveSolveSudoku($nums,$rowUsed,$colUsed,$boxUsed,$row,$col + 1);
        }
        return false;
    }
}

$obj = new Solution37();
$nums = [["5","3",".",".","7",".",".",".","."],["6",".",".","1","9","5",".",".","."],[".","9","8",".",".",".",".","6","."],["8",".",".",".","6",".",".",".","3"],["4",".",".","8",".","3",".",".","1"],["7",".",".",".","2",".",".",".","6"],[".","6",".",".",".",".","2","8","."],[".",".",".","4","1","9",".",".","5"],[".",".",".",".","8",".",".","7","9"]];
$obj->solveSudoku($nums);
print_r($nums);