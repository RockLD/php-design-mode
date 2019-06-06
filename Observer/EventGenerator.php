<?php

namespace Observer;

abstract class EventGenerator
{
    private $observers = array();
    //添加观察者
    function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }
    function notify()
    {
        foreach ($this->observers as $observer)
        {
            $observer->update();
        }
    }
}