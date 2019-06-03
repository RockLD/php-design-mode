
<?php
/**
 * 允许有多个autoload函数
 */
spl_autoload_register('autoload1');
spl_autoload_register('autoload2');

Test1::test();
Test2::test();

function autoload1($class)
{
    require __DIR__.'/'.$class.'.php';
}

function autoload2($class)
{
    require __DIR__ . '/' . $class . '.php';
}




/**
 * PHP 5.3之前的方法
 * 已废弃
 * 一个工程可能依赖多个框架，如果每个框架都有一个 autoload，会报函数重复定义的错误
 * PHP5.3之后使用 spl_autoload_register()代替
 * @param [type] $class
 * @return void
 */
// function __autoload( $class )
// {
//     require __DIR__.'/'.$class.'.php';
// }