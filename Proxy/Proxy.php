<?php

/**
 * 代理模式
 * 1、在客户端和实体之间建立一个代理对象（Proxy），客户端对实体进行操作全部委派给代理对象，隐藏实体的具体实现细节
 * 2、Proxy还可以与业务代码分离，部署到另外的服务器。业务代码中通过RPC来委派任务
 * 3、典型实现是mysql的读写分离
 */
class Proxy implements IUserProxy
{
    //读操作，可以设置为读取从库
    function getUserName($id)
    {
        echo "获取用户名字";
    }

    //写操作，可以设置未读取主库
    function setUserName($id, $name)
    {
        echo "修改用户名";
    }
}

interface IUserProxy
{
    function getUserName($id);
    function setUserName($id,$name);
}

$proxy = new Proxy();
$proxy->getUserName($id);
$proxy->setUserName($id,$name);