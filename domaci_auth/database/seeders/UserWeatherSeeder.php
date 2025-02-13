<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = $this->command->getOutput()->ask('Ime grada?');
        if ($city === null) {
            // vraca error kao die
            $this->command->getOutput()->error('Niste uneli ime grada');
        }
        $temperature = $this->command->getOutput()->ask('Koja je temperatura?');
        if ($temperature === null) {
            $this->command->getOutput()->error('Niste uneli temperaturu');
        }

        WeatherModel::create( [
            'city' => $city,
            'temperature' => $temperature
        ]);

        $this->command->getOutput()->info("Uspesno unet grad $city sa temperaturom od $temperature");

    }
}
