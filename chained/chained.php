<?php
/**
 * $db->where()->limit()->order();
 */

 class Database
 {
    function where($where)
    {
        return $this;
    }

    function order($order)
    {
        return $this;
    }

    function limit($limit)
    {
        return $this;
    }
 }

 $db = new Database();
//如果没有链式操作
// $db->where("id = 1");
// $db->where("sex = 1");
// $db->order("id desc");
// $db->limit(10);
//链式操作 1行代码结束
$db->where("id=1")->where("sex=1")->order("id desc")->limit(10);




