<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = [
            'Cardiologia',
            'Ortopedia',
            'Ginecologia',
            'Pediatria',
            'Dermatologia',
            'Neurologia',
            'Chirurgia generale',
            'Oncologia',
            'Oculistica',
            'Psichiatria',
        ];

        // Schema::disableForeignKeyConstraints();
        // Specialization::truncate();
        // Schema::enableForeignKeyConstraints();

        foreach ($specializations as $specialization){
            $newSpecialization = new Specialization();
            $newSpecialization->name = $specialization;
        //     $newSpecialization->slug = Str::slug($newSpecialization->name);
            $newSpecialization->save();
        }
    }
}
