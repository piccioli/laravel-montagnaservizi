<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $comunicazioni   = NewsCategory::where('slug', 'comunicazioni')->first();
        $approfondimenti = NewsCategory::where('slug', 'approfondimenti')->first();

        $articles = [
            [
                'news_category_id' => $comunicazioni?->id,
                'title'            => 'Benvenuti nel sito rinnovato di Montagna Servizi SCPA',
                'slug'             => 'benvenuti-sito-rinnovato-montagna-servizi',
                'excerpt'          => 'Siamo felici di presentare il nuovo sito istituzionale di Montagna Servizi SCPA, rinnovato nella grafica e nei contenuti per offrire un\'esperienza migliore a tutte le Sezioni e i Gruppi Regionali CAI.',
                'body'             => '<p>Siamo felici di presentare il nuovo sito istituzionale di Montagna Servizi SCPA, rinnovato nella grafica e nei contenuti per offrire un\'esperienza migliore a tutte le Sezioni e i Gruppi Regionali CAI che si affidano ai nostri servizi ogni giorno.</p><p>Il nuovo sito è pensato per essere chiaro, accessibile e aggiornato: troverete tutte le informazioni sui nostri servizi, il team che lavora per voi e le ultime comunicazioni dalla cooperativa.</p><p>Continuate a seguirci per rimanere aggiornati sulle novità.</p>',
                'published_at'     => now()->subDays(7),
            ],
            [
                'news_category_id' => $approfondimenti?->id,
                'title'            => 'Novità 2026: nuovi servizi di fundraising per le Sezioni CAI',
                'slug'             => 'novita-2026-fundraising-sezioni-cai',
                'excerpt'          => 'Montagna Servizi SCPA amplia la propria offerta con servizi dedicati al fundraising: bandi pubblici, contributi e raccolta fondi privati per le Sezioni e i Gruppi Regionali CAI.',
                'body'             => '<p>Montagna Servizi SCPA amplia la propria offerta con una nuova area dedicata al fundraising per le Sezioni e i Gruppi Regionali del Club Alpino Italiano.</p><p>Il nuovo servizio comprende:</p><ul><li>Ricerca e gestione di bandi pubblici (nazionali e europei)</li><li>Supporto alla rendicontazione dei contributi ottenuti</li><li>Consulenza per campagne di raccolta fondi privati</li></ul><p>Per informazioni e per richiedere una consulenza, utilizzate il pulsante "Contattaci" in cima alla pagina.</p>',
                'published_at'     => now()->subDays(3),
            ],
        ];

        foreach ($articles as $article) {
            News::firstOrCreate(['slug' => $article['slug']], $article);
        }
    }
}
