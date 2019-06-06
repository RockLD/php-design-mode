<?php

namespace undefined;

use Observer\EventGenerator;
use Observer\Observer;

class Event extends EventGenerator
{
    function trigger()
    {
        echo "Event\n";
        //向所有 观察者 发送通知
        $this->notify();
    }
}

/**测试**/
class Observer1 implements Observer
{
    function update()
    {
        echo "逻辑1";
    }
}

class Observer2 implements Observer
{
    function update()
    {
        echo "逻辑2";
    }
}

$event = new Event();
//增加观察者，可以动态修改，非侵入式
$event->addObserver(new Observer1);
$event->addObserver(new Observer2);
$event->trigger();