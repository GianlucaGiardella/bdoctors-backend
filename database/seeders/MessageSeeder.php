<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            [
                'nome' => 'Mario',
                'cognome' => 'Rossi',
                'mail' => 'mario.rossi@example.com',
                'testo' => 'Specializzato in Cardiologia.',
            ],
            [
                'nome' => 'Laura',
                'cognome' => 'Bianchi',
                'mail' => 'laura.bianchi@example.com',
                'testo' => 'Esperta in Ortopedia.',
            ],
            [
                'nome' => 'Giuseppe',
                'cognome' => 'Verdi',
                'mail' => 'giuseppe.verdi@example.com',
                'testo' => 'Ginecologo con anni di esperienza.',
            ],
            [
                'nome' => 'Roberta',
                'cognome' => 'Russo',
                'mail' => 'roberta.russo@example.com',
                'testo' => 'Pediatra dedicata ai bambini.',
            ],
            [
                'nome' => 'Carlo',
                'cognome' => 'Ferrari',
                'mail' => 'carlo.ferrari@example.com',
                'testo' => 'Specializzato in Dermatologia.',
            ],
            [
                'nome' => 'Elena',
                'cognome' => 'Gallo',
                'mail' => 'elena.gallo@example.com',
                'testo' => 'Neurologa con focus su malattie del sistema nervoso.',
            ],
            [
                'nome' => 'Paolo',
                'cognome' => 'Mancini',
                'mail' => 'paolo.mancini@example.com',
                'testo' => 'Chirurgo esperto in interventi complessi.',
            ],
            [
                'nome' => 'Sara',
                'cognome' => 'Ferraro',
                'mail' => 'sara.ferraro@example.com',
                'testo' => 'Specializzata in Oncologia e terapie innovative.',
            ],
            [
                'nome' => 'Luca',
                'cognome' => 'Ricci',
                'mail' => 'luca.ricci@example.com',
                'testo' => 'Oculista con attenzione alla salute degli occhi.',
            ],
            [
                'nome' => 'Anna',
                'cognome' => 'Moro',
                'mail' => 'anna.moro@example.com',
                'testo' => 'Psichiatra dedicata al benessere mentale.',
            ],
        ];

        foreach ($profiles as $profileData) {
            Message::create([
                'profile_id' => rand(1,10),
                'first_name' => $profileData['nome'],
                'last_name' => $profileData['cognome'],
                'email' => $profileData['mail'],
                'text' => $profileData['testo'],
            ]);
        }


    }
}
