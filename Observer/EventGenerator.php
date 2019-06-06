<?php

namespace Observer;

abstract class EventGenerator
{
    private $observers = array();
    //添加 观察者
    function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }
    //通知 观察者
    function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->update();
        }
    }
}

