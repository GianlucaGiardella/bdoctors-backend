<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// faker standard
use Faker\Generator as Faker;

//faker localizzato Italia per nomi e cognomi
use Faker\Provider\it_IT\Person as FakerIt;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FakerIt $fakerit, Faker $faker)
    {

      for ($i=1; $i <= 10 ; $i++) { 
        $user = new User();
        $user->name = $fakerit->firstName($gender=null);
        $user->surname = $fakerit->lastName();
        $user->email = $faker->email();
        $user->password = bcrypt("password$i");
        $user->save();
      }

      // account di test per poter loggare sempre dopo ogni refresh seed
      $user = new User();
        $user->name = "tizio";
        $user->surname = "caio";
        $user->email = "email@email.com";
        $user->password = bcrypt("password");
        $user->save();
    }
}