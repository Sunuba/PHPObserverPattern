# Observer Design Pattern

In this example I will show you how to implement Observer Design Pattern.

Our goal is to monitor weather in our city. For this purpose, we will use the following API:

>https://openweathermap.org/data/2.5/weather/?appid=b6907d289e10d714a6e88b30761fae22&id=587084&units=metric

Id here `id=587084` is the city that I am living. API result is shown below:

    {
    "coord": {
    "lon": 49.89,
    "lat": 40.38
    },
    "weather": [
    {
    "id": 803,
    "main": "Clouds",
    "description": "broken clouds",
    "icon": "04d"
    }
    ],
    "base": "stations",
    "main": {
    "temp": 7,
    "pressure": 1007,
    "humidity": 93,
    "temp_min": 7,
    "temp_max": 7
    },
    "visibility": 10000,
    "wind": {
    "speed": 4.1,
    "deg": 310
    },
    "clouds": {
    "all": 75
    },
    "dt": 1546842600,
    "sys": {
    "type": 1,
    "id": 8841,
    "message": 0.1029,
    "country": "AZ",
    "sunrise": 1546833811,
    "sunset": 1546867800
    },
    "id": 587084,
    "name": "Baku",
    "cod": 200
    }

I will monitor weather, main and wind status here. If any of them is changed I will notify the
listener. We will have one listener here.
> We can in reality divide this into three parts and three listener classes. But, in WeatherData 
class weatherHistory array is a concrete implementation, we can easily abstract it then we can
register three different weather data in three different concrete weather classes and extend the 
implementation in this way, but we do not need it right now, as it is not the scope for Observer 
Pattern
 
So, we will have 1 class which will register, unregister and notify the listener.

Our observer class (which will be abstract) defines functions that each individual parties will
use. It can be an interface as well, but sometimes you need to define some variables inside
class then abstract comes into help.

So,

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

The result is:

> Weather: broken clouds. Current temperature is 6C. Minimum temperature were 6C. Maximum 
temperature were 6C. Humidity is 70%. Visibility is 10000 feet. Wind speed is 3.6m/s and the 
wind direction is 140 degree.

Obviously, there is a room for imrpovement. For example, we can create another class named City.
Then we can initialize it with city id number and get specific data for the city and etc.