<?php
/**
 * 工厂方法或者类生成对象，而不是在代码中直接new
 *
 */
class Factory
{
    static function createObject()
    {
        // return new Object();
        return Object::getInstance();
    }
}

class Object
{
    private static $obj;
    private function __construct()
    {

    }

    static function getInstance()
    {
        //工厂 + 单例 模式
        if (self::$obj) {
            return self::$obj;
        }
        self::$obj = new self();
        return self::$obj;
    }

    function test()
    {
        echo "Factory + Singleton mode";
    }
}

$object = Factory::createObject();
$object->test();

