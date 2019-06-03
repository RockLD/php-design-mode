<?php
namespace Common;
class Loader
{
    static function autoload($class)
    {
        require BASE_URL . '/' . str_replace('\\','/',$class) .'.php';
    }
}