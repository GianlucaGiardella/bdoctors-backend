<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\Sponsorship;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSponsorshipSeeder extends Seeder
{
  public function run()
  {
    $profiles = Profile::all();
    $sponsorships = Sponsorship::all()->pluck("id")->toArray();

    foreach ($profiles as $profile) {
      $isSponsorized = rand(0, 1);
      for ($i = 0; $i < $isSponsorized; $i++) {
        $randomSponsorship = rand(1, count($sponsorships));
        $sponsorship = Sponsorship::find($randomSponsorship);
        $profile->sponsorships()->attach($sponsorship->id, [
          'start_date' => Carbon::now(),
          'end_date' => Carbon::now()->addHours($sponsorship->duration),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
      }
    }
  }
}
