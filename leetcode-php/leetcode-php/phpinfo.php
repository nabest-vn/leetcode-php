<?php

class Test
{
    public static $num;

    public function __construct()
    {
        self::$num = 0;
    }

    public function incr()
    {
        self::$num += 1;
    }
}

$t = new Test();
$t->incr();
$t->incr();
echo $t::$num;
echo Test::$num;