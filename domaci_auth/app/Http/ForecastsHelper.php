<?php

namespace App\Http;

class ForecastsHelper
{

    const WEATHER_ICONS = [
        'rainy' => 'fa-cloud-rain',
        'snowy' => 'fa-snowflake',
        'sunny' => 'fa-sun',
        'cloudy' => 'fa-cloud-sun'
    ];

    public static function getIconByWeatherType($type)
    {


        // zamena za switch kao i in_array
        return $icon = match ($type) {
            'rainy' => 'fa-cloud-rain',
            'snowy' => 'fa-snowflake',
            'sunny' => 'fa-sun',
            'cloudy' => 'fa-cloud-sun',
            default => 'fa-sun'
        };

//        // iz trenutne klase ForecastsHelper trazi konstantu WEATHER_ICONS
//        $icon = self::WEATHER_ICONS[$type];
//        return $icon;


    }

    public static function getColorByTemperature($temperature)
    {

        if ($temperature <= 0) {
            $boja = 'lightblue';
        } else if ($temperature >= 1 && $temperature <= 15) {
            $boja = 'blue';
        } else if ($temperature > 15 && $temperature <= 25) {
            $boja = 'green';
        } else {
            $boja = 'red';
        }
        return $boja;
    }


}
