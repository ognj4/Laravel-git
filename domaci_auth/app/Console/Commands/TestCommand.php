<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $url = 'https://reqres.in/api/users/2';
//        $response = Http::get($url);
//        // za ispis respons-> json()
//        dd($response->json()) ;


        $city = $this->argument('city');

        $url = "https://api.weatherapi.com/v1/current.json";
        $response = Http::get($url, [
            'key' => 'bc974de5281b46459e3164446252202',
            'q' => $city,
            'aqi' =>'no'
        ]);

        dd($response->body());
    }
}
