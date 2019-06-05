<?php
/**
 * 1、数据对象映射模式，是将对象和数据存储映射起来，对一个对象的操作会映射为对数据存储的操作
 */
//映射到user表
 class User
{
    public $id;
    public $name;
    public $mobile;

    protected $db;
    function __construct($id)
    {
        $this->db = new Mysql();
        $this->db->connect("", "", "", "");
        $res = $this->db->query("select * from user where id=".$id);
        $data = $res->fetch_assoc();
        $this->id = $data['id'];
        $this->id = $data['name'];
        $this->id = $data['mobile'];

    }

    function __destruct()
    {
        $this->db->close();
    }
}

$user = new User(1);
$user->name = "test";
$user->mobile = "18911112222";



interface IDatabase
{
    //连接
    function connect($host, $user, $passwd, $dbname);
    //查询
    function query($sql);
    //关闭连接
    function close();
}


class Mysql implements IDatabase
{
    //连接
    function connect($host, $user, $passwd, $dbname)
    { }
    //查询
    function query($sql)
    { }
    //关闭连接
    function close()
    { }
}

