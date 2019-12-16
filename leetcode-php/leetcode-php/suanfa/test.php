<?php

#include "SnowFlake.php";

$obj1 = new SnowFlake(41,10,12,11);

$obj2 = new SnowFlake(41,10,12,11);

$test = new Test();
$test->incr();
echo $test::$num;
while(true){
    for($i=0;$i<4098;$i++){
        try{
            $obj1::getId();
            if($obj1->_getIndex() == 3){
                echo $obj1->_getIndex();
            }
        }catch (Exception $e){
        }
    }
}
