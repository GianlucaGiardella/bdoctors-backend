<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
  public function run()
  {
    for ($i = 1; $i <= 5; $i++) {
      $vote = new Vote();
      $vote->vote = $i;
      $vote->save();
    }
  }
}
