<?php
/**
 * 单例模式
 * 使某个类的对象仅允许创建一个
 */
class Singleton
{
    static private $obj;
    private function __construct()
    {

    }

    static function getInstance()
    {
        if (self::$obj) {
            return self::$obj;
        }else{
            self::$obj = new self();
            return self::$obj;
        }
    }

    function test()
    {
        echo "test\n";
    }
}

//$obj = new Singleton();//无法实例化 private construct
$obj = Singleton::getInstance();
$obj->test();