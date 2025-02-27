<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table = 'cities';

    protected $fillable = ['city','name'];

    public function forecasts()
    {
        //                  Model sa kojim povezujemo    forecasts tabela    cities tabela
        return $this->hasMany(ForecastsModel::class,'city_id','id')
            ->orderBy('forecast_date');
    }

    // relacija one to one
    public function todaysForecast() {
        // izvlaci prognozu za taj grad i taj dan
        return $this->hasOne(ForecastsModel::class,'city_id','id')
            ->whereDate('forecast_date', Carbon::now());
}
}
