<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsDemoSeeder extends Seeder
{
    private const TITLES = [
        'Aggiornamenti sul servizio di segreteria operativa per le Sezioni CAI',
        'Nuovi strumenti di comunicazione per i Gruppi Regionali',
        'Rendicontazione delle quote sociali: guida pratica 2026',
        'Corsi di formazione per i responsabili amministrativi delle Sezioni',
        'Bando 2026 per il sostegno alle attività culturali del CAI',
        'Convenzione assicurativa rinnovata: cosa cambia per le Sezioni',
        'Gestione rifugi e bivacchi: le novità normative 2026',
        'Risultati del primo trimestre: i servizi erogati alle Sezioni',
        'Assemblea dei soci: convocazione e ordine del giorno',
        'Fundraising per le Sezioni CAI: le opportunità disponibili',
        'Aggiornamento sulle procedure di adesione a Veryfico',
        'Protezione civile CAI: aggiornamenti sul protocollo operativo',
        'Escursionismo e comunicazione: valorizzare le attività della Sezione',
        'Novità fiscali 2026 per le associazioni del Terzo Settore',
        'Strumenti digitali per la gestione moderna della Sezione',
        'Report annuale: i servizi erogati alle Sezioni nel 2025',
        'Workshop gratuito sulla gestione contabile per le Sezioni CAI',
        'Aggiornamento del catalogo servizi Montagna Servizi SCPA',
        'Come richiedere supporto al servizio di consulenze specialistiche',
        'Il team Montagna Servizi si presenta: chi siamo e cosa facciamo',
        'Sezioni CAI e sostenibilità: le iniziative supportate nel 2026',
        'Nuove procedure per la gestione dei rimborsi spese dei soci',
        'Comunicato: aggiornamento del contratto di servizio 2026-2027',
        'Formazione e montagna: il programma di eventi autunnali',
        'Guida alla compilazione del bilancio sociale per le Sezioni',
        'CAI e terzo settore: adempimenti obbligatori entro giugno 2026',
        'Accordo quadro con le federazioni sportive alpine: i dettagli',
        'Servizio di consulenza legale: nuovi sportelli disponibili',
        'Comunicazioni ufficiali dalla Presidenza — marzo 2026',
        'Supporto alla comunicazione digitale: i nuovi servizi attivi',
        'Gestione dei volontari nelle Sezioni CAI: aspetti assicurativi',
        'Veryfico 2026: le novità della piattaforma contabile',
        'Sezioni CAI: come accedere ai contributi ministeriali',
        'Sicurezza in montagna: le campagne di sensibilizzazione 2026',
        'Note operative sulla gestione dei corsi di alpinismo',
        'Aggiornamento privacy e GDPR per le Sezioni CAI',
        'I rifugi CAI tra sostenibilità e innovazione: il punto della situazione',
        'Assemblea straordinaria: modifica allo statuto sociale',
        'Comunicato stampa: nuova partnership con CAI Lombardia',
        'Montagna Servizi SCPA: i numeri del 2025 in sintesi',
    ];

    public function run(): void
    {
        $faker      = Faker::create('it_IT');
        $categories = NewsCategory::all();

        if ($categories->isEmpty()) {
            $this->command->warn('Nessuna categoria trovata. Eseguire prima NewsCategorySeeder.');
            return;
        }

        Storage::disk('public')->makeDirectory('news');

        $this->command->info('Creazione 40 articoli demo con immagini da picsum.photos...');

        $total   = count(self::TITLES);
        $created = 0;
        $skipped = 0;

        foreach (self::TITLES as $index => $title) {
            $n    = $index + 1;
            $slug = Str::slug($title);

            if (News::where('slug', $slug)->exists()) {
                $this->command->line("  <comment>[{$n}/{$total}] GIA' PRESENTE</comment> {$slug}");
                $skipped++;
                continue;
            }

            $coverImage  = $this->downloadImage($n);
            $publishedAt = $faker->dateTimeBetween('-12 months', '-1 day');

            News::create([
                'news_category_id' => $categories->random()->id,
                'title'            => $title,
                'slug'             => $slug,
                'excerpt'          => rtrim($faker->paragraph(2), '.') . '.',
                'body'             => $this->buildBody($faker),
                'cover_image'      => $coverImage,
                'published_at'     => $publishedAt,
            ]);

            $icon = $coverImage ? '<info>[img]</info>' : '<comment>[---]</comment>';
            $this->command->line("  {$icon} [{$n}/{$total}] {$title}");
            $created++;
        }

        $this->command->info("Completato: {$created} creati, {$skipped} già presenti.");
    }

    private function downloadImage(int $index): ?string
    {
        $filename = "news/demo-{$index}.jpg";

        if (Storage::disk('public')->exists($filename)) {
            return $filename;
        }

        try {
            $response = Http::timeout(15)->get("https://picsum.photos/seed/ms-news-{$index}/1200/675");

            if ($response->successful()) {
                Storage::disk('public')->put($filename, $response->body());
                return $filename;
            }
        } catch (\Exception $e) {
            $this->command->warn("    Immagine non scaricata (#{$index}): {$e->getMessage()}");
        }

        return null;
    }

    private function buildBody(\Faker\Generator $faker): string
    {
        $paragraphs = $faker->paragraphs(rand(4, 6));
        $html       = '';

        foreach ($paragraphs as $i => $para) {
            $html .= $i === 0
                ? "<p><strong>{$para}</strong></p>\n"
                : "<p>{$para}</p>\n";
        }

        if ($faker->boolean(50)) {
            $items = $faker->sentences(rand(3, 5));
            $html .= "<ul>\n";
            foreach ($items as $item) {
                $html .= "    <li>{$item}</li>\n";
            }
            $html .= "</ul>\n";
            $html .= '<p>' . $faker->paragraph() . "</p>\n";
        }

        return $html;
    }
}
