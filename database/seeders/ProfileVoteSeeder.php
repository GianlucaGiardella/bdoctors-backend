<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileVoteSeeder extends Seeder
{
  public function run()
  {
    $profiles = Profile::all();
    $votes = Vote::all()->pluck("id")->toArray();

    foreach ($profiles as $profile) {
      $numberOfVotes = rand(5, 20);
      for ($i = 0; $i < $numberOfVotes; $i++) {
        $randomStar = rand(1, count($votes));
        $vote = Vote::find($randomStar);
        $profile->votes()->attach($vote->id);
      }
    }
  }
}
