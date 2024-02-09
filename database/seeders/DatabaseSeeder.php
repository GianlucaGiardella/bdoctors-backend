<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // così richiamiamo più seeder insieme
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            MessageSeeder::class,
            ReviewSeeder::class,
            SpecializationSeeder::class,
            SponsorshipSeeder::class,
            VoteSeeder::class,
            ProfileVoteSeeder::class,
            ProfileSpecializationSeeder::class,
            ProfileSponsorshipSeeder::class,
        ]);
    }
}
