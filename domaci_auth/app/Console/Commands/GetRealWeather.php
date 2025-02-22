<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        echo time();
    }
}
