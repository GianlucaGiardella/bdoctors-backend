<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $reviews = [
            [
                'name' => 'Mario',
                'surname' => 'Bianchi',
                'text' => 'Il Dott. Rossi è stato eccezionale! Molto professionale e gentile.',
            ],
            [
                'name' => 'Laura',
                'surname' => 'Verdi',
                'text' => 'La Dott.ssa Bianchi è una professionista straordinaria. Consigliatissima.',
            ],
            [
                'name' => 'Giuseppe',
                'surname' => 'Rossi',
                'text' => 'Il Dott. Verdi è sempre stato disponibile e competente. Ottimo medico.',
            ],
            [
                'name' => 'Roberta',
                'surname' => 'Moro',
                'text' => 'La Dott.ssa Moro è una delle migliori del settore. Grande professionalità.',
            ],
            [
                'name' => 'Carlo',
                'surname' => 'Gallo',
                'text' => 'Il Dott. Gallo è molto preparato e attento alle esigenze dei pazienti.',
            ],
            [
                'name' => 'Elena',
                'surname' => 'Russo',
                'text' => 'La Dott.ssa Russo è una neurologa eccezionale. Ha risolto i miei problemi.',
            ],
            [
                'name' => 'Paolo',
                'surname' => 'Ferraro',
                'text' => 'Il Dott. Ferraro è un chirurgo di grande talento. Sono molto grato per l\'intervento.',
            ],
            [
                'name' => 'Sara',
                'surname' => 'Mancini',
                'text' => 'La Dott.ssa Mancini è una specialista in oncologia straordinaria. Ha curato mia madre con dedizione.',
            ],
            [
                'name' => 'Luca',
                'surname' => 'Ferrari',
                'text' => 'Il Dott. Ferrari è un oculista di grande esperienza. Ho fiducia completa nel suo lavoro.',
            ],
            [
                'name' => 'Anna',
                'surname' => 'Gallo',
                'text' => 'La Dott.ssa Gallo è una psichiatra premurosa e professionale. Ha aiutato la mia famiglia in momenti difficili.',
            ],
        ];


        foreach ($reviews as $review) {
            Review::create([
                'profile_id' => rand(1, 10),
                'name' => $review['name'],
                'surname' => $review['surname'],
                'text' => $review['text'],
            ]);
        }
    }
}
