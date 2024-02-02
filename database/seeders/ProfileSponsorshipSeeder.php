<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $profiles = Profile::all();
      $sponsorships = Sponsorship::all()->pluck("id")->toArray();

      foreach($profiles as $profile) {
        $isSponsorized = rand(0, 1);
        for ($i=0; $i < $isSponsorized ; $i++) {
          $randomSponsorship = rand(1, count($sponsorships));
          $sponsorship = Sponsorship::find($randomSponsorship);
          $profile->sponsorships()->attach($sponsorship->id);
        }
      }
    }
}