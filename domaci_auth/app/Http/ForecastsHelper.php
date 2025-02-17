<?php

namespace App\Http;

class ForecastsHelper
{

    const WEATHER_ICONS = [
        'rainy' => 'fa-cloud-rain',
        'snowy' => 'fa-snowflake',
        'sunny' => 'fa-sun'
    ];

    public static function getColorByTemperature($temperature){

        if($temperature <= 0)
        {
            $boja = 'lightblue';
        }
        else if($temperature >= 1 && $temperature <= 15)
        {
            $boja = 'blue';
        }
        else if($temperature > 15 && $temperature <= 25)
        {
            $boja = 'green';
        }
        else
        {
            $boja = 'red';
        }
        return $boja;
    }

    public static function getIconByWeatherType($type){
        // iz trenutne klase ForecastsHelper trazi konstantu WEATHER_ICONS
        $icon = self::WEATHER_ICONS[$type];
        return $icon;
    }
}
