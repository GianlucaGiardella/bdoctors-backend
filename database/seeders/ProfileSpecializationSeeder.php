<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $profiles = Profile::all();
      $specializations = Specialization::all()->pluck("id")->toArray();

      foreach($profiles as $profile) {
        $numberOfSpecialization = rand(2, 8);
        for ($i=0; $i < $numberOfSpecialization ; $i++) {
          $randomSpecializations = rand(1, count($specializations));
          $specialization = Specialization::find($randomSpecializations);
          $profile->specializations()->attach($specialization->id);
        }
      }
    }
}