<?
require_once 'WeatherNow/WeatherNow.php';

$WeatherNowAPI = new WeatherNowAPI();

$yandex = $WeatherNowAPI->YandexAPI();
$gis = $WeatherNowAPI->GismeteoAPI();
$open = $WeatherNowAPI->OpenWeatherMapAPI();
print_r($open);
