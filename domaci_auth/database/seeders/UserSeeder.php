<?php

namespace Database\Seeders;

use App\Models\User;
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

        // Domaci 2 nacin

//        $email = $this->command->getOutput()->ask('Unesite email');
//        if ($email === null) {
//            $this->command->getOutput()->error('Niste uneli email');
//            return;
//        }
//        $name = $this->command->getOutput()->ask('Unesite ime');
//        if ($name === null) {
//            $this->command->getOutput()->error('Niste uneli name');
//            return;
//        }
//        $password = $this->command->getOutput()->ask('Unesite password');
//        if ($password === null) {
//            $this->command->getOutput()->error('Niste uneli password');
//            return;
//        }
//
//        $user = User::where(['email' => $email])->first();
//        if ($user instanceof User) {
//            $this->command->getOutput()->error('Ovaj email je vec u bazi!');
//            return;
//        }

    }
}
