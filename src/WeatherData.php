<?php


namespace Obs;


class WeatherData extends Subject
{

    private $weatherHistory = [];

    function setState(string $weather)
    {
        array_push ($this->weatherHistory, $weather);
        $this->notify();
    }

    function getState()
    {
        return end($this->weatherHistory);
    }
}