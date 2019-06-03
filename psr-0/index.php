<?php
/**
 * App放业务代码
 * Common放与业务无关的公共类
 */
define("BASE_URL",__DIR__);

include BASE_URL . "/Common/Loader.php";

spl_autoload_register('\\Common\\Loader::autoload');

Common\Object::test();
App\Controllers\Home\Index::test();