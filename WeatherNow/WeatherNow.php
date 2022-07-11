<?
require_once 'WeatherNow/WeatherNowSettings.php';
require_once 'WeatherNow/WeatherNowCoord.php';
class WeatherNowAPI{    
   
    public function YandexAPI(){    
        $setting = WeatherNowSettings::GetAPIKeyYandex();
        $keys = 'X-Yandex-API-Key:'. $setting;
        $coord =  WeatherNowCoord::GetCoord();
        $url = 'https://api.weather.yandex.ru/v2/forecast?lat='.$coord[0].'&lon='.$coord[1].'&lang=ru_RU&limit=1';        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            $keys,
            'Content-Type: application/json',
         ));
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        return $response;
    }

    public function GismeteoAPI(){
        $setting = WeatherNowSettings::GetAPIKeyGismeteo();
        $keys = 'X-Gismeteo-Token: '. $setting;
        $coord = WeatherNowCoord::GetCoord();
        $url = 'https://api.gismeteo.net/v2/weather/current/?latitude='.$coord[0].'&longitude='.$coord[0];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            $keys,
            'Accept-Encoding: deflate',
            'Content-Type: application/json',
         ));
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        return $response;
    }

    public function OpenWeatherMapAPI(){
        $setting = WeatherNowSettings::GetAPIKeyOpenWeatherMap();
        $keys = 'X-Gismeteo-Token: '. $setting;
        $coord = WeatherNowCoord::GetCoord();
        $url = 'https://api.openweathermap.org/data/2.5/weather?lat='.$coord[0].'&lon='.$coord[1].'&appid='. $setting.'&units=metric';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        return $response;
    }   
}
