<?php


namespace Obs;


abstract class Subject
{
    private $observers = [];
    abstract function setState(string $state);
    abstract function getState();

    public function registerObserver(Observer $observer)
    {
        array_push ($this->observers, $observer);
    }

    public function unregisterObserver(Observer $observer)
    {
        if (($key = array_search($observer, $this->observers)) !== false) {
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $obs)
        {
            $obs->update();
        }
    }

}