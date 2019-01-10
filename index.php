<?php require_once ('vendor/autoload.php');

use Obs\WeatherData;
use Obs\Weather;

$weatherData = new WeatherData();

$weatherClient = new Weather($weatherData);

$weatherClient->registerObserver ($weatherClient);

$wd = file_get_contents ('https://openweathermap.org/data/2.5/weather/?appid=b6907d289e10d714a6e88b30761fae22&id=587084&units=metric');
$json = json_decode($wd, false);


$message = $json->weather[0]->description . '. ';
$message = $message . 'Current temperature is ' . $json->main->temp . 'C. ';
$message = $message . 'Minimum temperature were ' . $json->main->temp_min . 'C. ';
$message = $message . 'Maximum temperature were ' . $json->main->temp_max . 'C. ';
$message = $message . 'Humidity is ' . $json->main->humidity . '%. ';
$message = $message . 'Visibility is ' . $json->visibility . ' feet. ';
$message = $message . 'Wind speed is ' . $json->wind->speed . 'm/s ';
$message = $message . 'and the wind direction is ' . $json->wind->deg . ' degree. ';

$weatherClient->addMessage($message);
