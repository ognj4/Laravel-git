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
        $url = "https://reqres.in/api/users?page=2";

       $jsonResponse = $response = Http::get($url);

       // pretvaramo iz jsona u php assoc array sto mozemo da koristimo
       $jsonResponse = json_decode($jsonResponse, true);

       dd($jsonResponse['data'][0]['email']);
    }
}
