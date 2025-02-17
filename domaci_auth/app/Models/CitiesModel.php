<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitiesModel extends Model
{
    protected $table = 'cities';

    protected $fillable = ['city'];

    public function forecasts()
    {
        //                  Model sa kojim povezujemo    forecasts tabela    cities tabela
        return $this->hasMany(ForecastsModel::class,'city_id','id')
            ->orderBy('forecast_date');
    }
}
