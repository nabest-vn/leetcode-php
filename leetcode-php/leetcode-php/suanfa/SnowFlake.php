<?php
/**
 * Created by PhpStorm.
 * User: chenzhe
 * Date: 2019/12/16
 * Time: 5:08 下午
 * Desc:
 */

final class SnowFlake
{
     private static $initialTime = 1576487398;
     private static $maxTime = 0;
     private static $maxWorkerId = 0;
     private static $maxIndex = 0;
     private static $timeBits = 0;
     private static $workerIdBits = 0;
     private static $indexBits = 0;
     private static $workerId = 0;
     private static $index;
     private static $lastSecond;

     public final function __construct($timeBits, $workerIdBits, $indexBits, $workerId)
     {
         self::$timeBits = $timeBits;
         self::$workerIdBits = $workerIdBits;
         self::$indexBits = $indexBits;
         self::$maxTime = -1 ^ (-1 << $timeBits);
         self::$maxWorkerId = -1 ^ (-1 << $workerIdBits);
         self::$maxIndex = -1 ^ (-1 << $indexBits);
         self::$workerId = $workerId;
     }


     public static function getId()
     {
         if(time() - self::$initialTime > self::$maxTime){
             throw new Exception("时间超出了限制");
         }
         if(self::$maxWorkerId < self::$workerId){
             throw new Exception("workerId超出了限制");
         }
         if(time() == self::$lastSecond){
             SnowFlake::$index ++;
         }else{
             SnowFlake::$index = 0;
         }
         if(self::$index > self::$maxIndex){
             throw new Exception("index超出了限制");
         }
         $res = (time() - self::$initialTime) << (self::$workerIdBits + self::$indexBits);
         $res += self::$workerId << self::$indexBits;
         $res += self::$index;
         self::$lastSecond = time();
         return $res;
     }

     public function _getIndex(){
         return self::$index;
     }
}
