<?php


namespace Obs;


abstract class Observer
{
    protected $subject;
    abstract public function update();
    abstract public function registerObserver(Observer $observer);
    abstract public function unregisterObserver(Observer $observer);

}