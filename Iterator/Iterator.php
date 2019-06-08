<?php

/**
 * 迭代器模式
 * 1、在不需要了解内部实现的前提下，遍历一个聚合对象的内部元素
 * 2、可以隐藏遍历元素的所需操作
 */
//实现spl库中的接口
class AllUser implements Iterator
{
    protected $ids;
    protected $data = [];
    protected $index;
    function __construct()
    {
        $db = Factory::getDatabase();
        $result = $db->query();
        $this->ids = $result->fetch_all(MYSQLI_ASSOC);
    }

    //获取当前元素
    function current()
    {
        $id = $this->ids[$this->index]['id'];
        return Factory::getUser($id);
    }

    //获取下一个元素
    function next()
    {
        $this->index++;
    }

    //验证是否还有下一个元素
    function valid()
    {
        return $this->index < count($this->ids);
    }

    //重置迭代器
    function rewind()
    {
        $this->index = 0;
    }
    //标识迭代器中的位置
    function key()
    {
        return $this->index;
    }
}

$users = new AllUser();
foreach ($users as $user)
{
    var_dump($user);
}