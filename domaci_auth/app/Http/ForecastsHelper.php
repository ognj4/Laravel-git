<?php

namespace App\Http;

class ForecastsHelper
{

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
}
