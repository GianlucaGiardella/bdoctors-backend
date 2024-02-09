<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    public function run()
    {
        $profiles = [
            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'mail' => 'mario.rossi@example.com',
                'text' => 'Specializzato in Cardiologia.',
            ],
            [
                'name' => 'Laura',
                'surname' => 'Bianchi',
                'mail' => 'laura.bianchi@example.com',
                'text' => 'Esperta in Ortopedia.',
            ],
            [
                'name' => 'Giuseppe',
                'surname' => 'Verdi',
                'mail' => 'giuseppe.verdi@example.com',
                'text' => 'Ginecologo con anni di esperienza.',
            ],
            [
                'name' => 'Roberta',
                'surname' => 'Russo',
                'mail' => 'roberta.russo@example.com',
                'text' => 'Pediatra dedicata ai bambini.',
            ],
            [
                'name' => 'Carlo',
                'surname' => 'Ferrari',
                'mail' => 'carlo.ferrari@example.com',
                'text' => 'Specializzato in Dermatologia.',
            ],
            [
                'name' => 'Elena',
                'surname' => 'Gallo',
                'mail' => 'elena.gallo@example.com',
                'text' => 'Neurologa con focus su malattie del sistema nervoso.',
            ],
            [
                'name' => 'Paolo',
                'surname' => 'Mancini',
                'mail' => 'paolo.mancini@example.com',
                'text' => 'Chirurgo esperto in interventi complessi.',
            ],
            [
                'name' => 'Sara',
                'surname' => 'Ferraro',
                'mail' => 'sara.ferraro@example.com',
                'text' => 'Specializzata in Oncologia e terapie innovative.',
            ],
            [
                'name' => 'Luca',
                'surname' => 'Ricci',
                'mail' => 'luca.ricci@example.com',
                'text' => 'Oculista con attenzione alla salute degli occhi.',
            ],
            [
                'name' => 'Anna',
                'surname' => 'Moro',
                'mail' => 'anna.moro@example.com',
                'text' => 'Psichiatra dedicata al benessere mentale.',
            ],
        ];

        foreach ($profiles as $profileData) {
            Message::create([
                'profile_id' => rand(1, 10),
                'name' => $profileData['name'],
                'surname' => $profileData['surname'],
                'email' => $profileData['mail'],
                'text' => $profileData['text'],
            ]);
        }
    }
}
