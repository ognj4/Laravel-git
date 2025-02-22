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
    protected $signature = 'app:test-command';

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

        $url = 'https://reqres.in/api/create';
        $response = Http::post($url, [
            'name' => 'Ognjen',
            'job' => 'Programer'
        ]);
        dd($response->json());
    }
}
