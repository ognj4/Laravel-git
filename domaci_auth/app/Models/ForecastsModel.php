<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastsModel extends Model
{
    protected $table = 'forecasts';

    protected $fillable = [
        'city_id', 'temperature', 'forecast_date','weather_type', 'probability'
    ];

    const WEATHERS = ['rainy','sunny','snowy','cloudy'];
    public function city()
    {
        // ovako pravimo one to one relaciju, dajemo mu model iz kog uzimamo foreign
        return $this->hasOne(CitiesModel::class,'id','city_id');
    }
}
