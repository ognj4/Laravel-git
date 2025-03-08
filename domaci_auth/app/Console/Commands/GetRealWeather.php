<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use App\Services\WeatherService;
use Illuminate\Console\Command;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to synchronize real life weather with our application using the Ope API';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $city = $this->argument('city');

        // php artisan weather:get-real Belgrade -> SELECT * FROM citites WHERE name = 'Belgrade'

        // Izvadi iz Citties grad koji ima ime = Belgrade
        $dbCity = CitiesModel::where(['name' => $city])->first();

        // Ako grad ne postoji
        if ($dbCity === null) {
            // Napravi novi grad i vrati njegove podatke iz baze (id)
            $dbCity = CitiesModel::create(['name' => $city]);
        }


        $weathetService = new WeatherService();
        $jsonResponse = $weathetService->getForecast($city);

        if (isset($jsonResponse['error'])) {
            $this->output->error($jsonResponse['error']['message']);
        }

        if ($dbCity->todaysForecast !== null) {
            $this->output->comment('Command finished!');
            return;
        }

        $forecastDay = $jsonResponse['forecast']['forecastday'][0];

        $forecastDate = $forecastDay['date'];
        $temperature = $forecastDay['day']['avgtemp_c'];
        $weathetType = $forecastDay['day']['condition']['text'];
        $probability = $forecastDay['day']['daily_chance_of_rain'];

        $forecast = [
            'city_id' => $dbCity->id,
            'temperature' => $temperature,
            'forecast_date' => $forecastDate,
            'weather_type' => strtolower($weathetType),
            'probability' => $probability
        ];

        ForecastsModel::create($forecast);
        $this->output->comment('Added new forecast!');


    }
}
