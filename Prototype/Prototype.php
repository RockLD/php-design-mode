<?php

/**
 * 原型模式
 * 1、与工厂模式作用类似，都是用来创建对象
 * 2、与工厂模式实现不同，原型模式是先创建好一个原型对象，然后通过clone原型对象来创建新的对象。这样就免去了类创建时重复的初始化操作
 * 3、原型模式适用于大对象的创建。创建一个大对象需要很大的开销，如果每次new就会消耗很大，原型模式仅需内存拷贝即可
 * 4、单例模式或者工厂模式常见的是实例化对象，原型模式clone之后可以带有初始化信息
 */

 //假设是一个大对象，需要大量的消耗性计算
class Prototype
{
    function init()
    {

    }

    function init2()
    {

    }
}

$prototype = new Prototype();
$prototype->init();
$prototype->init2();
//以上为大对象的初始化工作
//可以直接克隆大对象，避免多次创建和繁琐的初始化工作
//相当于已经init()、init2()之后的$prototype
$p1 = clone $prototype;
$pe = clone $prototype;