<?php

/**
 * 配置与设计模式
 * 1、PHP中使用ArrayAccess实现配置文件的加载
 * 2、在工厂方法中读取配置，生成可配置化的对象
 * 3、使用装饰器模式实现权限验证，模板渲染，JSON串化
 * 4、使用观察者模式实现数据更新时间的一系列更新操作
 * 5、使用代理模式实现数据库的主从自动切换
 */
class AutoloadConfig
{

}

//ArrayAccess 是PHP标准库中的接口
//可以使一个对象变成可以用数组的方式访问
class Config implements ArrayAccess
{
    protected $path;
    protected $configs = [];

    function __construct($path)
    {
        $this->path = $path;
    }

    //获取数组的key
    function offsetGet($key)
    {
        if (empty($this->configs[$key])) {
            //设置配置文件的绝对路径
            $file_path = $this->path.'/'.$key.'.php';
            $config = require $file_path;
            $this->configs[$key] = $config;
        }
        return $this->configs[$key];
    }

    //删除数组的key
    function offsetUnset($key)
    {
        // TODO: Implement offsetUnset() method.
    }

    //数组的key是否存在
    function offsetExists($key)
    {
        // TODO: Implement offsetExists() method.
    }

    //设置数组的key
    function offsetSet($key, $value)
    {
        // TODO: Implement offsetSet() method.
    }
}

$config = new Config(__DIR__.'/configs');
var_dump($config['controller']);