<?php

/**
 * 装饰器模式
 * 1、可以动态地添加修改类的功能
 * 2、一个类提供了一项功能，如果要修改并添加额外的功能，传统编程模式，需要写一个子类集成它，并重新实现类的方法
 * 3、使用装饰器模式，仅需在运行时添加一个装饰器对象即可实现，可以实现最大的灵活性
 */
//模拟画布类
 class Canvas
 {
     protected $decorators= [];
     //模拟初始化
    function init()
    {
        echo "init";
    }
    //添加装饰器
    function addDecorator(Decorator $decorator)
    {
        $this->decorators[] = $decorator;
    }
    //执行装饰器
    function beforeDraw()
    {
        foreach ($this->decorators as $decorator) {
            $decorator->beforeDraw();
        }
    }

    function afterDraw()
    {
        $decorators = array_reverse($this->decorators);
        foreach ( $decorators as $decorator) {
            $decorator->afterDraw();
        }
    }
    //模拟画
    function draw()
    {
        $this->beforeDraw();
        echo "do draw\n";
        $this->afterDraw();
    }
 }

 class ColorDrawDecorator implements Decorator
 {
     function beforeDraw()
     {
         echo "begin color draw\n";
     }

     function afterDraw()
     {
         echo "after color draw\n";
     }
 }
interface Decorator
{
    function beforeDraw();
    function afterDraw();
}

//执行
$canvas = new Canvas();
//添加装饰器，可以添加同类型的其他装饰器
$canvas->addDecorator(new ColorDrawDecorator);
$canvas->draw();