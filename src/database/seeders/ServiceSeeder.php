<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            // Segreteria Operativa
            [
                'category_slug' => 'segreteria-operativa',
                'slug'          => 'gestione-corrispondenza',
                'title'         => 'Gestione corrispondenza',
                'subtitle'      => 'Ricezione, smistamento e archiviazione della posta',
                'description'   => 'Gestiamo tutta la corrispondenza in entrata e in uscita della vostra Sezione, garantendo ordine, tracciabilità e risposta nei tempi previsti dallo Statuto CAI.',
                'body'          => '<p>Il servizio di gestione corrispondenza include la ricezione e lo smistamento della posta ordinaria e certificata, la redazione di lettere e comunicazioni ufficiali, l\'archiviazione digitale e cartacea e il monitoraggio delle scadenze.</p>',
                'sort_order'    => 1,
            ],
            [
                'category_slug' => 'segreteria-operativa',
                'slug'          => 'verbali-e-delibere',
                'title'         => 'Verbali e delibere',
                'subtitle'      => 'Redazione e conservazione dei verbali di assemblea e consiglio',
                'description'   => 'Verbalizzazione professionale di assemblee ordinarie, straordinarie e riunioni di consiglio, con archiviazione sicura e conformità normativa.',
                'body'          => '<p>Il servizio comprende la partecipazione alle riunioni (in presenza o da remoto), la redazione del verbale in forma corretta, la raccolta delle firme e l\'archiviazione in formato digitale firmato elettronicamente.</p>',
                'sort_order'    => 2,
            ],

            // Comunicazione
            [
                'category_slug' => 'comunicazione',
                'slug'          => 'gestione-social-media',
                'title'         => 'Gestione social media',
                'subtitle'      => 'Presenza coordinata su Facebook, Instagram e LinkedIn',
                'description'   => 'Pianifichiamo e pubblichiamo contenuti sui canali social della vostra Sezione, aumentando la visibilità e il coinvolgimento dei soci e del territorio.',
                'body'          => '<p>Il servizio include la definizione del piano editoriale mensile, la creazione di contenuti (testo + grafica), la pubblicazione programmata e il monitoraggio delle metriche di engagement.</p>',
                'sort_order'    => 1,
            ],
            [
                'category_slug' => 'comunicazione',
                'slug'          => 'newsletter-associativa',
                'title'         => 'Newsletter associativa',
                'subtitle'      => 'Comunicazione periodica ai soci via email',
                'description'   => 'Progettiamo e inviamo newsletter periodiche ai soci della vostra Sezione, con notizie, eventi e aggiornamenti redatti in modo chiaro e professionale.',
                'body'          => '<p>Il servizio comprende la raccolta dei contenuti, la redazione dei testi, la composizione grafica della newsletter, l\'invio tramite piattaforma professionale (Brevo) e il report di statistiche (aperture, click).</p>',
                'sort_order'    => 2,
            ],

            // Contabilità Veryfico
            [
                'category_slug' => 'contabilita-veryfico',
                'slug'          => 'tenuta-contabilita',
                'title'         => 'Tenuta contabilità',
                'subtitle'      => 'Contabilità ordinaria con software Veryfico CAI',
                'description'   => 'Gestiamo la contabilità della vostra Sezione con il software Veryfico, lo strumento ufficiale CAI per la gestione economico-finanziaria delle Sezioni.',
                'body'          => '<p>Il servizio include la registrazione di tutte le entrate e uscite, la riconciliazione bancaria mensile, la gestione del piano dei conti CAI e la produzione dei report periodici richiesti dalla sede centrale.</p>',
                'sort_order'    => 1,
            ],
            [
                'category_slug' => 'contabilita-veryfico',
                'slug'          => 'rendiconto-annuale',
                'title'         => 'Rendiconto annuale',
                'subtitle'      => 'Predisposizione del bilancio per l\'assemblea dei soci',
                'description'   => 'Predisponiamo il rendiconto annuale della vostra Sezione in conformità con le indicazioni CAI, pronto per l\'approvazione in assemblea.',
                'body'          => '<p>Il servizio comprende la redazione del rendiconto consuntivo e preventivo, la nota integrativa, il prospetto delle variazioni patrimoniali e la documentazione per il Collegio dei Revisori.</p>',
                'sort_order'    => 2,
            ],

            // Consulenze
            [
                'category_slug' => 'consulenze',
                'slug'          => 'consulenza-legale-cai',
                'title'         => 'Consulenza legale CAI',
                'subtitle'      => 'Supporto legale specializzato per le Sezioni CAI',
                'description'   => 'Offriamo consulenza legale specializzata sulle normative che regolano le Sezioni CAI: statuto, responsabilità, assicurazioni, rapporti con enti pubblici.',
                'body'          => '<p>Il servizio include la revisione e l\'aggiornamento dello statuto sezionale, la consulenza su questioni di responsabilità civile e penale legate all\'attività alpinistica, il supporto nei rapporti con enti locali e regionali.</p>',
                'sort_order'    => 1,
            ],
            [
                'category_slug' => 'consulenze',
                'slug'          => 'consulenza-amministrativa',
                'title'         => 'Consulenza amministrativa',
                'subtitle'      => 'Supporto organizzativo e procedurale',
                'description'   => 'Supportiamo la vostra Sezione nelle attività amministrative quotidiane: procedure, adempimenti, relazioni con CAI Centrale e enti di controllo.',
                'body'          => '<p>Il servizio comprende la consulenza sugli adempimenti periodici (assemblee, rinnovo cariche, aggiornamento libro soci), il supporto nella gestione dei rapporti con CAI Centrale e i Gruppi Regionali, e l\'assistenza nella predisposizione di regolamenti interni.</p>',
                'sort_order'    => 2,
            ],

            // Fundraising
            [
                'category_slug' => 'fundraising',
                'slug'          => 'bandi-e-contributi-pubblici',
                'title'         => 'Bandi e contributi pubblici',
                'subtitle'      => 'Ricerca e gestione di bandi nazionali ed europei',
                'description'   => 'Individuiamo i bandi pubblici più adatti alla vostra Sezione e vi supportiamo in tutte le fasi: dalla candidatura alla rendicontazione finale.',
                'body'          => '<p>Il servizio include la mappatura continua dei bandi disponibili (Comuni, Regioni, Ministeri, UE), la valutazione di ammissibilità, la redazione della domanda di contributo e il supporto nella rendicontazione delle spese.</p>',
                'sort_order'    => 1,
            ],
            [
                'category_slug' => 'fundraising',
                'slug'          => 'raccolta-fondi-privati',
                'title'         => 'Raccolta fondi privati',
                'subtitle'      => 'Campagne di donazione e sponsorizzazioni locali',
                'description'   => 'Progettiamo campagne di raccolta fondi per finanziare i progetti della vostra Sezione, coinvolgendo donatori privati, aziende locali e la comunità.',
                'body'          => '<p>Il servizio comprende la definizione della strategia di raccolta fondi, la creazione dei materiali di comunicazione, la gestione della campagna online (crowdfunding) e il coordinamento con i partner locali.</p>',
                'sort_order'    => 2,
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
