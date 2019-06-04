<?php
/**
 * 适配器模式，可以将截然不同的函数接口封装成统一的API
 * eg.mysql mysqli pdo  3种可以用适配器模式统一成一致。类似的还有缓存统一 cache适配器
 * 首先约定好接口
 * 然后根据业务做不同的实现
 */
class Mysql implements IDatabase
{
    //连接
    function connect($host, $user, $passwd, $dbname)
    {

    }
    //查询
    function query($sql)
    {

    }
    //关闭连接
    function close()
    {

    }
}

class Mysqli implements IDatabase
{
    //连接
    function connect($host, $user, $passwd, $dbname)
    {

    }
    //查询
    function query($sql)
    {

    }
    //关闭连接
    function close()
    {

    }
}

class Pdo implements IDatabase
{
    //连接
    function connect($host, $user, $passwd, $dbname)
    {

    }
    //查询
    function query($sql)
    {

    }
    //关闭连接
    function close()
    {

    }
}


interface IDatabase
{
    //连接
    function connect($host,$user,$passwd,$dbname);
    //查询
    function query($sql);
    //关闭连接
    function close();
}

$db = new Mysql();
$db->connect("", "", "", "");
$db->query("show databases;");
$db->close();
