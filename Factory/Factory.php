<?php
/**
 * 工厂方法或者类生成对象，而不是在代码中直接new
 *
 */
class Factory
{
    static function createObject()
    {
        return new Object();
    }
}

class Object
{

}

$object = Factory::createObject();

