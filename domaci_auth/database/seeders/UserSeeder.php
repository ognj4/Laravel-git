<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // command ask koliko da upise korisnika
        $ammount = $this->command->getOutput()->ask('Koliko korisnika zelite?',20);

        $password = $this->command->getOutput()->ask('Koja je sifra?', '123456');

        $faker = Factory::create();
        // progress bar
        $this->command->getOutput()->progressStart($ammount);

        for($i = 0; $i < $ammount; $i++){
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($password)
            ]);

            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
