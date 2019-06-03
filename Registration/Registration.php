<?php
/**
 * 注册模式
 * 主要用于全局共享和交换对象
 */
class Registration
{
    protected static $objs;
    static function set($alias,$obj)
    {
        self::$objs[$alias] = $obj;
    }

    static function get($name)
    {
        return self::$objs[$name];
    }

    static function _unset($alias)
    {
        unset(self::$objs[$alias]);
    }
}

//在Factory中使用注册器
class Factory
{
    static function createObject()
    {
        // return new Object();
        $obj = Object::getInstance();
        Registration::set("obj1",$obj);
        return $obj;
    }
}

class Object
{
    private static $obj;
    private function __construct()
    { }

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
        echo "Factory + Singleton + Registration mode";
    }
}

//初始化的时候讲对象注册到注册器
Factory::createObject();

//业务代码中，直接从注册器中讲对象拿出使用
$obj = Registration::get( "obj1");
$obj->test();





