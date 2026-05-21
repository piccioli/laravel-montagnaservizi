<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
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

    private const EXCERPTS = [
        'Montagna Servizi SCPA aggiorna le proprie procedure per offrire un supporto sempre più efficiente alle Sezioni e ai Gruppi Regionali del Club Alpino Italiano.',
        'Una panoramica completa sulle novità introdotte nel servizio, con indicazioni pratiche per i responsabili delle Sezioni CAI che ne usufruiscono.',
        'Il documento illustra le principali modifiche operative e le scadenze da rispettare per il corretto svolgimento delle attività amministrative.',
        'Montagna Servizi SCPA mette a disposizione nuove risorse e strumenti per supportare le Sezioni nella gestione quotidiana delle attività sociali.',
        'Un aggiornamento importante per tutti i referenti delle Sezioni CAI: ecco le informazioni essenziali da conoscere e le azioni da intraprendere.',
        'Il comunicato fornisce chiarimenti sulle procedure in vigore e introduce miglioramenti significativi nel servizio offerto alle Sezioni.',
        'Le novità presentate in questo articolo riguardano direttamente la gestione amministrativa e contabile delle Sezioni e dei Gruppi Regionali.',
        'Montagna Servizi SCPA condivide i risultati raggiunti e le prospettive future per continuare a supportare al meglio le realtà del CAI.',
    ];

    private const BODY_PARAGRAPHS = [
        '<p><strong>Montagna Servizi SCPA continua a rafforzare il proprio impegno verso le Sezioni e i Gruppi Regionali del Club Alpino Italiano, introducendo aggiornamenti significativi nei propri servizi.</strong></p>',
        '<p>Le modifiche introdotte rispondono alle esigenze emerse nel corso delle consultazioni con i referenti delle Sezioni, che hanno segnalato la necessità di strumenti più efficaci e procedure semplificate per la gestione delle attività quotidiane.</p>',
        '<p>Il servizio di segreteria operativa ha registrato una crescita costante nelle richieste di supporto, segno di una fiducia sempre maggiore da parte delle Sezioni nei confronti di Montagna Servizi SCPA come partner strategico.</p>',
        '<p>Gli aggiornamenti riguardano in particolare la gestione documentale, la rendicontazione delle attività e il supporto alla comunicazione istituzionale, ambiti in cui le Sezioni hanno espresso il maggiore interesse per un miglioramento dei servizi.</p>',
        '<p>Il team di Montagna Servizi SCPA è a disposizione per fornire chiarimenti e supporto nell\'implementazione delle nuove procedure, garantendo una transizione fluida e senza interruzioni nelle attività delle Sezioni.</p>',
        '<p>Per ulteriori informazioni o per richiedere un appuntamento con uno dei nostri consulenti, è possibile contattare la segreteria operativa attraverso i canali ufficiali di Montagna Servizi SCPA.</p>',
    ];

    private const LIST_ITEMS = [
        ['Aggiornamento delle procedure di registrazione dei soci', 'Nuovi modelli per la rendicontazione delle attività', 'Supporto dedicato per le Sezioni di nuova costituzione'],
        ['Revisione del contratto di servizio', 'Nuove tariffe per le consulenze specialistiche', 'Estensione del supporto alla comunicazione digitale'],
        ['Formazione online per i responsabili amministrativi', 'Strumenti di reportistica avanzata', 'Assistenza nella predisposizione del bilancio sociale'],
        ['Aggiornamento del software gestionale', 'Nuovi template per la comunicazione istituzionale', 'Supporto alla gestione dei volontari'],
        ['Revisione delle procedure assicurative', 'Aggiornamento normativo per il Terzo Settore', 'Nuovi servizi di consulenza legale'],
    ];

    public function run(): void
    {
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
            $publishedAt = $this->randomDate($index);

            News::create([
                'news_category_id' => $categories->get($index % $categories->count())->id,
                'title'            => $title,
                'slug'             => $slug,
                'excerpt'          => self::EXCERPTS[$index % count(self::EXCERPTS)],
                'body'             => $this->buildBody($index),
                'cover_image'      => $coverImage,
                'published_at'     => $publishedAt,
            ]);

            $icon = $coverImage ? '<info>[img]</info>' : '<comment>[---]</comment>';
            $this->command->line("  {$icon} [{$n}/{$total}] {$title}");
            $created++;
        }

        $this->command->info("Completato: {$created} creati, {$skipped} già presenti.");
    }

    private function randomDate(int $seed): \DateTime
    {
        $daysAgo = ($seed * 9 + 7) % 365 + 1;
        return (new \DateTime())->modify("-{$daysAgo} days");
    }

    private function buildBody(int $index): string
    {
        $html = self::BODY_PARAGRAPHS[0];

        $paragraphCount = ($index % 3) + 3;
        for ($i = 1; $i <= $paragraphCount && $i < count(self::BODY_PARAGRAPHS); $i++) {
            $html .= self::BODY_PARAGRAPHS[$i];
        }

        if ($index % 2 === 0) {
            $listSet = self::LIST_ITEMS[$index % count(self::LIST_ITEMS)];
            $html .= "<ul>\n";
            foreach ($listSet as $item) {
                $html .= "    <li>{$item}</li>\n";
            }
            $html .= "</ul>\n";
            $html .= self::BODY_PARAGRAPHS[count(self::BODY_PARAGRAPHS) - 1];
        }

        return $html;
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
}
