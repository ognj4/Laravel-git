<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Finder\Iterator\SortableIterator;

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
        $dbCity = CitiesModel::where(['name'=> $city ])->first();

        // Ako grad ne postoji
        if ($dbCity === null) {
            // Napravi novi grad i vrati njegove podatke iz baze (id)
            $dbCity = CitiesModel::create(['name' => $city]);
        }


        $response = Http::get(env('weather_api_url').'v1/forecast.json', [
            'key' => env('WEATHER_API_KEY'),
            'q' => $city,
            'aqi' =>'no',
            'days' => 1,
        ]);

        $jsonResponse = $response->json();
        if (isset($jsonResponse['error'])) {
            $this->output->error($jsonResponse['error']['message']);
        }

        if($dbCity->todaysForecast !== null) {
            $this->output->comment('Command finished!');
            return;
        }

        $forecastDate = $jsonResponse['forecast']['forecastday'][0]['date'];
        $temperature = $jsonResponse['forecast']['forecastday'][0]['day']['avgtemp_c'];
        $weathetType = $jsonResponse['forecast']['forecastday'][0]['day']['condition']['text'];
        $probability = $jsonResponse['forecast']['forecastday'][0]['day']['daily_chance_of_rain'];

        $forecast = [
            'city_id' => $dbCity->id,
            'temperature' => $temperature ,
            'forecast_date' => $forecastDate,
            'weather_type' =>strtolower($weathetType) ,
            'probability'=> $probability
        ];

        ForecastsModel::create($forecast);
        $this->output->comment('Added new forecast!');


    }
}
