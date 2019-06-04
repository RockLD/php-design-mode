<?php
/**
 * 策略模式，将一组特定的行为和算法封装成类，以适应某些特定的上下文环境
 * eg.电商网站系统，针对男女用户跳转不同的类目，并展示不同的广告
 * 使用策略模式实现IoC 控制反转 和 依赖倒置
 */
interface UserStrategy
{
    function showAd();
    function showCate();
}

class FemaleUserStrategy implements UserStrategy
{
    function showAd()
    {
        echo "女装广告";
    }
    function showCate()
    {
        echo "女装";
    }
}

class MaleUserStrategy implements UserStrategy
{
    function showAd()
    {
        echo "男士广告";
    }
    function showCate()
    {
        echo "男性分类";
    }
}

//使用
class Page
{
    protected $strategy;
    function index()
    {
        $this->strategy->showAd();
        $this->strategy->showCate();
    }

    function setStrategy(\UserStrategy $strategy)
    {
        $this->strategy = $strategy;
    }
}

$page = new Page();
if (isset($_GET['female'])) {
    $page->setStrategy(new FemaleUserStrategy());
}else {
    $page->setStrategy(new MaleUserStrategy());
}
$page->index();
