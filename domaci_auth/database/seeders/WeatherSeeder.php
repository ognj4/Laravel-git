<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */



    public function run(): void
    {
        $prognoza = [
            'Beograd' => 22,
            'Novi Sad' => 23,
            'Sarajevo' => 25,
            'Zagreb' => 26,
        ];

        // prelazimo i upisujemo svaki element u tabelu
        foreach($prognoza as $city => $temperature) {
            $userWeather = WeatherModel::where(['city' => $city])->first();
            if ($userWeather !== null) {
                $this->command->getOutput()->error('Grad vec postoji');
                continue;
            }

            WeatherModel::create([
                'city' => $city,
                'temperature' => $temperature
            ]);

         }
    }
}
