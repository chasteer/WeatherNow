<?
require_once 'WeatherNow/WeatherNowIP.php' ;
class WeatherNowCoord 
{
    public static function GetCoord(){
        $curIP = WeatherNowIP::GetRealIp();
        if($curIP != '127.0.0.1'){
            $ch = curl_init('http://ip-api.com/json/' .$curIP . '?lang=ru');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $res = curl_exec($ch);
            curl_close($ch);            
            $res = json_decode($res);
            return array($res->lat,$res->lon);
        }
        else{
            $ch = curl_init('http://ip-api.com/json/' .'178.72.91.59' . '?lang=ru');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $res = curl_exec($ch);
            curl_close($ch);            
            $res = json_decode($res);
            return array($res->lat,$res->lon);
        }
        return array('55.7522200','37.6155600');//По умолчанию Москва
    }
}
