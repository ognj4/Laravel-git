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
//        *********** WITH FAKER **************
//        // command ask koliko da upise korisnika
//        $ammount = $this->command->getOutput()->ask('Koliko korisnika zelite?',20);
//
//        $password = $this->command->getOutput()->ask('Koja je sifra?', '123456');
//
//        $faker = Factory::create();
//        // progress bar
//        $this->command->getOutput()->progressStart($ammount);
//
//        for($i = 0; $i < $ammount; $i++){
//
//            if (User::where('email', $faker->email)->exists()) {
//                $this->command->getOutput()->error("Email je vec u bazi!");
//            } else {
//                User::create([
//                    'name' => $faker->name,
//                    'email' => $faker->email,
//                    'password' => Hash::make($password)
//                ]);
//            }
//            $this->command->getOutput()->progressAdvance();
//        }
//        $this->command->getOutput()->progressFinish();

        // DOMACI BONUS
        $email = $this->command->getOutput()->ask('Unesite email');
        $name = $this->command->getOutput()->ask('Unesite ime');
        $password = $this->command->getOutput()->ask('Unesite password');

        if (User::where('email',$email)->exists()){
            $this->command->getOutput()->error('Ovaj email je vec u bazi!');
        } else {
            User::create([
                'email' => $email,
                'name' => $name,
                'password' => Hash::make($password)
            ]);

            $this->command->getOutput()->info('Uspesno dodat korisnik!');
        }

    }
}
