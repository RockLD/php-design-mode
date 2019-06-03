<?php
/**
 * __get/__set
 * __call/__callStatic
 * __toString   将对象转换为字符串
 * __invoke     将对象当函数执行时
 */

 class Magic
 {
    //类构造函数
    function __construct($param)
    {
        var_dump(__METHOD__,$param);
    }

    protected $array = [];

    //设置一个类的成员变量时调用
    function __set($name, $value)
    {
        var_dump(__METHOD__);
        $this->array[$name] = $value;
    }

    //获得一个类的成员变量时调用
    function __get($name)
    {
        var_dump(__METHOD__);
        if (!isset($this->array[$name])) {
            return $name."尚未定义";
        }
        return $this->array[$name];
    }

    //在对象中调用一个不可访问方法时调用
    function __call($func,$param)
    {
        var_dump(__METHOD__);
        var_dump($func,$param);
    }

    //用静态方式调用一个不可访问方法时调用
    static function __callStatic($name, $arguments)
    {
        var_dump($name,$arguments);
    }

    //当对不可访问属性调用isset()或empty()时调用
    function __isset($name)
    {
        var_dump(__METHOD__);
    }

    //当对不可访问属性调用unset()时被调用
    function __unset($name)
    {
        var_dump( __METHOD__);
    }

    //类被当成字符串时的回应方法
    function __toString()
    {
        return __CLASS__;
    }

    //调用函数的方式调用一个对象时的回应方法
    function __invoke($param)
    {
        var_dump($param);
        return "invoke";
    }

    //执行serialize()时，先会调用这个函数
    function __sleep()
    {
        var_dump(__METHOD__);
    }
    //执行unserialize()时，先会调用这个函数
    function __wakeup()
    {
        var_dump(__METHOD__);
    }

    //调用var_export()导出类时，此静态方法会被调用
    static function __set_state($properties)
    {
        var_dump(__METHOD__,$properties);
    }

    //当对象复制完成时调用
    function __clone()
    {
        var_dump(__METHOD__);
    }

    //尝试加载未定义的类
    function __autoload($class)
    {

    }

    //打印所需调试信息
    function __debugInfo()
    {

    }

    private function my_serialize($value)
    {
        serialize($value);
    }
    private function my_unserialize($value)
    {
        unserialize($value);
    }

    //类的析构函数
    function __destruct()
    {
        var_dump(__METHOD__);
    }
 }

 $obj = new Magic("hh"); //test - __construct
 echo "------------------\n";
 isset($obj->test); //test - __isset
 echo "------------------\n";
 unset($obj->test); //test - __isset
 echo "------------------\n";
 echo $obj->my_serialize($obj->title1);//test - __sleep
 echo "------------------\n";
 echo $obj->my_unserialize($obj->title1); //test - __wakeup
 $obj->title = "test"; //test - __set
 echo "------------------\n";
 echo $obj->title; //test - __get
 echo "------------------\n";
 $obj->test("hello"); //test - __call
 echo "------------------\n";
 Magic::test("hello_static"); //test - __callStatic
 echo "------------------\n";
 echo $obj; //test - __toString
 echo "------------------\n";
 echo $obj("test_invoke"); //test - __invode
 echo "------------------\n";
