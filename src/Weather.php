<?php


namespace Obs;


class Weather extends Observer
{

    public $subject = null;

    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }

    public function registerObserver(Observer $observer)
    {
     $this->subject->registerObserver ($observer);
    }

    public function unregisterObserver(Observer $observer)
    {
        $this->subject->unregisterObserver($observer);
    }

    public function addMessage(string $message)
    {
        $this->subject->setState($message);
    }

    public function update()
    {
        echo 'Weather: ' . $this->subject->getState();
    }
}