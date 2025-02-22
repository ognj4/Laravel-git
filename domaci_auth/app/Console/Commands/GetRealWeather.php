<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This comand is used to synchronize real life weather with our application using the Ope API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = "https://api.weatherapi.com/v1/current.json?key=bc974de5281b46459e3164446252202&q=London&aqi=no";
        $response = Http::get($url);

        dd($response->body());
    }
}
