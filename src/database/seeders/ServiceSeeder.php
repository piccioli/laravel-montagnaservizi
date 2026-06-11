<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [

            // ─── Segreteria Operativa ───────────────────────────────────────
            [
                'category_slug' => 'segreteria-operativa',
                'slug'          => 'segreteria-a-distanza',
                'title'         => 'Segreteria a distanza (SOAD)',
                'subtitle'      => 'Supporto amministrativo remoto per Sezioni e Gruppi Regionali',
                'description'   => 'Gestiamo cartelle condivise, verbali di riunioni online, newsletter interne, raccolta dati via form e supporto ai contenuti web e social: tutto da remoto, senza bisogno di una risorsa in sede.',
                'body'          => '<p>Il servizio SOAD (Segreteria Operativa a Distanza) copre tutte le attività amministrative ordinarie che la vostra Sezione svolge quotidianamente: gestione della corrispondenza in entrata e in uscita, organizzazione di cartelle condivise, redazione di verbali delle riunioni online, controllo del budget di attività, invio di newsletter ai soci, raccolta di informazioni tramite form digitali e supporto alla produzione di contenuti per il sito web e i canali social.</p><p>Il servizio è modulare: ogni Sezione sceglie le attività di cui ha bisogno e il pacchetto più adatto alla propria dimensione.</p><h2>Cosa include</h2><ul><li>Gestione cartelle condivise (Google Drive / SharePoint)</li><li>Redazione verbali di assemblee e riunioni di consiglio</li><li>Controllo e rendiconto del budget attività</li><li>Invio newsletter ai soci tramite Brevo</li><li>Raccolta dati via form Typeform (iscrizioni, sondaggi)</li><li>Supporto ai contenuti web e social della Sezione</li></ul>',
                'sort_order'    => 1,
            ],
            [
                'category_slug' => 'segreteria-operativa',
                'slug'          => 'segreteria-in-presenza',
                'title'         => 'Segreteria in presenza (SOAP)',
                'subtitle'      => 'Una risorsa dedicata presso la sede della Sezione',
                'description'   => 'Una risorsa Montagna Servizi opera fisicamente presso la vostra sede per gestire l\'amministrazione ordinaria, i rapporti con soci e fornitori e le attività di segreteria fiscale e associativa.',
                'body'          => '<p>Il servizio SOAP (Segreteria Operativa in Presenza) è pensato per le Sezioni CAI e i Gruppi Regionali che necessitano di una figura dedicata presso la propria sede. La risorsa di Montagna Servizi gestisce in prima persona l\'intera operatività amministrativa: dalla ricezione della posta e dei visitatori alla gestione del registro soci, dall\'archiviazione documentale ai rapporti con l\'Agenzia delle Entrate e gli altri enti.</p><h2>Cosa include</h2><ul><li>Presidio fisico della segreteria nei giorni e negli orari concordati</li><li>Ricezione e gestione della corrispondenza ordinaria e PEC</li><li>Aggiornamento del registro soci e gestione delle quote</li><li>Rapporti con CAI Centrale, Gruppi Regionali e enti pubblici</li><li>Supporto agli adempimenti fiscali e associativi periodici</li></ul>',
                'sort_order'    => 2,
            ],
            [
                'category_slug' => 'segreteria-operativa',
                'slug'          => 'organizzazione-eventi',
                'title'         => 'Organizzazione eventi',
                'subtitle'      => 'Supporto logistico e operativo per assemblee e riunioni',
                'description'   => 'Pianifichiamo e coordiniamo assemblee ordinarie e straordinarie, riunioni di consiglio, eventi associativi e incontri istituzionali, gestendo ogni aspetto organizzativo dalla convocazione alla chiusura dei lavori.',
                'body'          => '<p>Dall\'assemblea annuale dei soci all\'evento di fine anno, ogni riunione richiede preparazione, coordinamento e documentazione. Il nostro servizio di organizzazione eventi si occupa di tutta la fase organizzativa, così il direttivo può concentrarsi sui contenuti.</p><h2>Cosa include</h2><ul><li>Predisposizione e invio delle convocazioni nel rispetto dello Statuto</li><li>Prenotazione e allestimento della sala (se necessario)</li><li>Preparazione dell\'ordine del giorno e dei materiali per i partecipanti</li><li>Supporto alla conduzione dei lavori (in presenza o da remoto)</li><li>Redazione e distribuzione del verbale finale</li><li>Gestione delle presenze e raccolta delle deleghe</li></ul>',
                'sort_order'    => 3,
            ],
            [
                'category_slug' => 'segreteria-operativa',
                'slug'          => 'gestione-documentale',
                'title'         => 'Gestione documentale',
                'subtitle'      => 'Archiviazione, conservazione e organizzazione della documentazione',
                'description'   => 'Organizziamo e conserviamo tutta la documentazione associativa — verbali, contratti, polizze, atti — in formato digitale sicuro, accessibile e conforme alle normative sulla conservazione dei documenti.',
                'body'          => '<p>Una documentazione ordinata è la base di una Sezione CAI ben gestita. Il servizio di gestione documentale di Montagna Servizi digitalizza, archivia e conserva tutti i documenti associativi in modo sicuro e facilmente consultabile, eliminando il rischio di perdita e semplificando i controlli da parte del Collegio dei Revisori o degli enti pubblici.</p><h2>Cosa include</h2><ul><li>Digitalizzazione e indicizzazione dei documenti esistenti</li><li>Archiviazione digitale strutturata su cloud condiviso</li><li>Conservazione dei verbali, contratti, polizze assicurative e atti societari</li><li>Gestione delle scadenze documentali (rinnovi, adempimenti periodici)</li><li>Accesso controllato per i membri del direttivo</li></ul><p>Il servizio è incluso nei pacchetti SOAD.</p>',
                'sort_order'    => 4,
            ],

            // ─── Comunicazione ─────────────────────────────────────────────
            [
                'category_slug' => 'comunicazione',
                'slug'          => 'newsletter-associativa',
                'title'         => 'Newsletter associativa',
                'subtitle'      => 'Comunicazione periodica ai soci via email',
                'description'   => 'Progettiamo e inviamo newsletter periodiche ai soci della vostra Sezione tramite Brevo, con notizie, eventi e aggiornamenti redatti in modo chiaro e professionale.',
                'body'          => '<p>La newsletter è lo strumento più diretto per mantenere viva la relazione con i soci. Montagna Servizi si occupa di raccogliere i contenuti dal direttivo, redigerli in forma leggibile e inviarli con cadenza regolare tramite la piattaforma Brevo, già integrata con le liste di distribuzione della Sezione.</p><h2>Cosa include</h2><ul><li>Piano editoriale mensile concordato con il direttivo</li><li>Raccolta e redazione dei contenuti (eventi, comunicazioni, notizie)</li><li>Composizione grafica della newsletter (template con brand CAI)</li><li>Invio tramite Brevo con gestione delle iscrizioni e disiscrizioni</li><li>Report mensile di statistiche (aperture, click, disiscrizioni)</li></ul>',
                'sort_order'    => 1,
            ],
            [
                'category_slug' => 'comunicazione',
                'slug'          => 'raccolta-dati-form',
                'title'         => 'Raccolta dati e form digitali',
                'subtitle'      => 'Form Typeform per iscrizioni, sondaggi e raccolta informazioni',
                'description'   => 'Creiamo e gestiamo form digitali professionali per raccogliere iscrizioni a corsi ed eventi, sondaggi ai soci e richieste di informazioni, con i dati disponibili in tempo reale.',
                'body'          => '<p>Raccogliere dati in modo ordinato e senza errori è essenziale per qualsiasi Sezione CAI. Utilizziamo Typeform per creare form intuitivi e professionali, integrati con i fogli di calcolo o i sistemi già in uso dalla Sezione.</p><h2>Cosa include</h2><ul><li>Progettazione e creazione del form (iscrizioni, sondaggi, richieste)</li><li>Configurazione delle notifiche automatiche al compilatore e al direttivo</li><li>Integrazione con Google Sheets o altri strumenti di gestione dati</li><li>Raccolta e organizzazione delle risposte</li><li>Supporto all\'analisi dei dati raccolti</li></ul>',
                'sort_order'    => 2,
            ],
            [
                'category_slug' => 'comunicazione',
                'slug'          => 'supporto-web-social',
                'title'         => 'Supporto web e social media',
                'subtitle'      => 'Contenuti per sito web e canali social della Sezione',
                'description'   => 'Produciamo contenuti per il sito web e i canali social (Facebook, Instagram) della vostra Sezione, con un piano editoriale pensato per il pubblico CAI e il territorio di riferimento.',
                'body'          => '<p>Una presenza digitale curata aiuta la Sezione CAI ad attrarre nuovi soci, comunicare le attività e rafforzare il legame con il territorio. Montagna Servizi produce contenuti testuali e grafici su misura, coerenti con l\'identità visiva del CAI e con le specificità della vostra Sezione.</p><h2>Cosa include</h2><ul><li>Piano editoriale mensile per i canali social</li><li>Redazione e pubblicazione di post su Facebook e Instagram</li><li>Produzione di grafiche semplici (locandine eventi, annunci)</li><li>Aggiornamento delle pagine del sito web della Sezione</li><li>Monitoraggio delle metriche di base (reach, engagement)</li></ul>',
                'sort_order'    => 3,
            ],
            [
                'category_slug' => 'comunicazione',
                'slug'          => 'presenza-eventi-fiere',
                'title'         => 'Presenza a eventi e fiere',
                'subtitle'      => 'Organizzazione e gestione stand per il CAI a fiere nazionali',
                'description'   => 'Organizziamo e gestiamo la presenza del CAI ai principali eventi nazionali — Salone del Libro di Torino, Italian Outdoor Festival, Fa\' la cosa giusta! e altri — curando allestimento, materiali e comunicazione.',
                'body'          => '<p>Montagna Servizi coordina la partecipazione del Club Alpino Italiano ai principali eventi nazionali di settore e cultura. Dalla logistica dell\'allestimento alla produzione dei materiali promozionali, fino alla gestione del personale allo stand, ci occupiamo di tutto per permettere al CAI di farsi conoscere nel modo migliore.</p><h2>Cosa include</h2><ul><li>Scouting e selezione degli eventi più adatti agli obiettivi del CAI</li><li>Coordinamento con gli organizzatori dell\'evento per accrediti e spazi</li><li>Allestimento e gestione dello stand durante i giorni dell\'evento</li><li>Produzione di materiali promozionali (brochure, roll-up, gadget)</li><li>Presidio dello stand con personale Montagna Servizi o coordinamento dei volontari CAI</li><li>Report post-evento con dati di contatto raccolti e risultati</li></ul><p><strong>Esempi di eventi seguiti:</strong> Salone del Libro di Torino, Italian Outdoor Festival di Gardone Riviera, Fa\' la cosa giusta! di Milano, SICAI.</p>',
                'sort_order'    => 4,
            ],
            [
                'category_slug' => 'comunicazione',
                'slug'          => 'materiali-comunicazione',
                'title'         => 'Materiali di comunicazione',
                'subtitle'      => 'Produzione di materiali promozionali e istituzionali',
                'description'   => 'Supportiamo la produzione di materiali di comunicazione — brochure, locandine, comunicati stampa, presentazioni — coerenti con le linee guida visive del Club Alpino Italiano.',
                'body'          => '<p>Ogni Sezione CAI ha bisogno di materiali di comunicazione professionali per presentarsi al territorio, comunicare i propri servizi e promuovere le attività. Montagna Servizi supporta la produzione di questi materiali, garantendo coerenza con l\'identità visiva del CAI e qualità dei contenuti.</p><h2>Cosa include</h2><ul><li>Brochure istituzionali e di presentazione dei servizi</li><li>Locandine e manifesti per eventi e corsi</li><li>Comunicati stampa per media locali e nazionali</li><li>Presentazioni PowerPoint per assemblee e incontri istituzionali</li><li>Template riutilizzabili per comunicazioni ricorrenti</li></ul>',
                'sort_order'    => 5,
            ],

            // ─── Contabilità Veryfico ───────────────────────────────────────
            [
                'category_slug' => 'contabilita-veryfico',
                'slug'          => 'veryfico-mini',
                'title'         => 'Veryfico Mini',
                'subtitle'      => 'Contabilità di cassa per Sezioni con esigenze semplici',
                'description'   => 'Il piano d\'ingresso di Veryfico: contabilità di cassa completa, senza anagrafica soci né modulo rimborsi. Ideale per Sezioni con volumi ridotti e gestione semplice.',
                'body'          => '<p>Veryfico Mini è la soluzione ideale per le Sezioni CAI più piccole o con una gestione contabile semplice. Include la contabilità di cassa con il piano dei conti standard CAI, la produzione del rendiconto annuale e l\'accesso tramite My CAI.</p><h2>Cosa include</h2><ul><li>Contabilità di cassa con piano dei conti CAI</li><li>Rendiconto annuale per l\'assemblea dei soci</li><li>Accesso con credenziali My CAI</li><li>Conservazione documenti su cloud</li><li>Supporto all\'adozione e webinar di onboarding</li></ul><p><strong>Non include:</strong> anagrafica soci, sincronizzazione piattaforma CAI, modulo rimborsi.</p>',
                'sort_order'    => 1,
            ],
            [
                'category_slug' => 'contabilita-veryfico',
                'slug'          => 'veryfico-premium',
                'title'         => 'Veryfico Premium',
                'subtitle'      => 'Anagrafica soci, rimborsi e sincronizzazione con la piattaforma CAI',
                'description'   => 'La soluzione più scelta dalle Sezioni CAI: anagrafica soci integrata, sincronizzazione con la piattaforma CAI, modulo rimborsi spese e contabilità di cassa completa.',
                'body'          => '<p>Veryfico Premium aggiunge alle funzioni del piano Mini la gestione completa dell\'anagrafica soci, la sincronizzazione automatica con la piattaforma nazionale CAI e il modulo per la gestione dei rimborsi spese ai soci. È la scelta ideale per la maggior parte delle Sezioni.</p><h2>Cosa include</h2><ul><li>Tutto il piano Mini</li><li>Anagrafica soci con storico quote e dati personali</li><li>Sincronizzazione bidirezionale con la piattaforma CAI</li><li>Modulo rimborsi spese per escursioni e attività</li><li>Report personalizzabili per il direttivo</li></ul>',
                'sort_order'    => 2,
            ],
            [
                'category_slug' => 'contabilita-veryfico',
                'slug'          => 'veryfico-maxi',
                'title'         => 'Veryfico Maxi',
                'subtitle'      => 'Contabilità per competenza e bilancio sociale per Sezioni strutturate',
                'description'   => 'Il piano completo: contabilità per competenza, gestione del bilancio sociale ETS, tutto l\'anagrafica e il modulo rimborsi. Per Sezioni con obbligo di bilancio ETS o esigenze contabili avanzate.',
                'body'          => '<p>Veryfico Maxi è pensato per le Sezioni CAI di maggiori dimensioni o con obbligo di redazione del bilancio sociale ai sensi del Codice del Terzo Settore. Aggiunge ai piani inferiori la contabilità per competenza e il modulo per la redazione del bilancio sociale.</p><h2>Cosa include</h2><ul><li>Tutto il piano Premium</li><li>Contabilità per competenza (obbligatoria sopra determinate soglie ETS)</li><li>Modulo bilancio sociale conforme al Codice del Terzo Settore</li><li>Prospetto delle variazioni patrimoniali</li><li>Supporto alla predisposizione della documentazione per il Collegio dei Revisori</li></ul>',
                'sort_order'    => 3,
            ],
            [
                'category_slug' => 'contabilita-veryfico',
                'slug'          => 'consulenza-veryfico',
                'title'         => 'Consulenza e supporto Veryfico',
                'subtitle'      => 'Accompagnamento all\'adozione e all\'uso quotidiano della piattaforma',
                'description'   => 'Affianchiamo la vostra Sezione nell\'adozione di Veryfico: configurazione iniziale, migrazione dei dati, formazione del tesoriere e supporto continuativo per qualsiasi dubbio operativo.',
                'body'          => '<p>L\'adozione di un nuovo software contabile può sembrare complessa. Montagna Servizi affianca ogni Sezione passo dopo passo: dalla configurazione iniziale dell\'account alla migrazione dei dati storici, fino alla formazione del tesoriere e al supporto operativo nel corso dell\'anno.</p><h2>Cosa include</h2><ul><li>Configurazione iniziale dell\'account Veryfico</li><li>Migrazione dei dati dalla contabilità precedente</li><li>Sessione di formazione dedicata per il tesoriere (webinar)</li><li>Supporto continuativo via email per quesiti operativi</li><li>Aggiornamento sulle novità della piattaforma</li></ul><p>Il supporto base è incluso in tutti i piani Veryfico acquistati tramite Montagna Servizi.</p>',
                'sort_order'    => 4,
            ],
            [
                'category_slug' => 'contabilita-veryfico',
                'slug'          => 'dichiarazioni-fiscali',
                'title'         => 'Dichiarazioni fiscali e adempimenti ETS',
                'subtitle'      => 'Modello EAS, dichiarazioni annuali e adempimenti periodici',
                'description'   => 'Gestiamo gli adempimenti fiscali periodici della vostra Sezione: Modello EAS, dichiarazione dei redditi, comunicazioni RUNTS e tutti gli obblighi previsti dal Codice del Terzo Settore.',
                'body'          => '<p>Le Sezioni CAI sono enti del Terzo Settore soggetti a una serie di adempimenti fiscali e normativi che cambiano di anno in anno. Montagna Servizi, in collaborazione con i propri consulenti fiscali convenzionati, gestisce tutti gli obblighi periodici con la massima cura e nei tempi previsti dalla legge.</p><h2>Cosa include</h2><ul><li>Presentazione del Modello EAS (variazioni dati)</li><li>Dichiarazione dei redditi annuale (Modello Redditi ENC)</li><li>Comunicazioni e aggiornamenti al Registro Unico del Terzo Settore (RUNTS)</li><li>Gestione dell\'obbligo di bilancio sociale (se applicabile)</li><li>Monitoraggio delle scadenze fiscali e invio promemoria al direttivo</li></ul>',
                'sort_order'    => 5,
            ],

            // ─── Consulenze ────────────────────────────────────────────────
            [
                'category_slug' => 'consulenze',
                'slug'          => 'consulenza-terzo-settore',
                'title'         => 'Consulenza Terzo Settore',
                'subtitle'      => 'Supporto alla trasformazione ETS e agli adempimenti statutari',
                'description'   => 'Analizziamo la situazione della vostra Sezione rispetto al Codice del Terzo Settore e vi supportiamo in tutte le fasi: trasformazione ETS, adeguamento statutario, bilanci e comunicazioni al RUNTS.',
                'body'          => '<p>Il Codice del Terzo Settore ha profondamente cambiato il quadro normativo per le associazioni come le Sezioni CAI. Montagna Servizi offre un servizio di consulenza specializzata per aiutare ogni Sezione a comprendere i propri obblighi e adeguarsi con serenità.</p><h2>Cosa include</h2><ul><li>Analisi della situazione attuale rispetto agli obblighi ETS</li><li>Supporto all\'adeguamento dello statuto sezionale</li><li>Accompagnamento nella procedura di iscrizione al RUNTS</li><li>Predisposizione del bilancio sociale (se obbligatorio)</li><li>Consulenza sugli adempimenti periodici (assemblee, rinnovo cariche)</li></ul>',
                'sort_order'    => 1,
            ],
            [
                'category_slug' => 'consulenze',
                'slug'          => 'consulenza-commercialista',
                'title'         => 'Consulenza commercialista',
                'subtitle'      => 'Contabilità, dichiarazioni fiscali e bilancio con tariffe convenzionate',
                'description'   => 'Accedete a consulenze commercialistiche specializzate in associazionismo e Terzo Settore a tariffe convenzionate, grazie all\'accordo di Montagna Servizi con l\'Associazione Nazionale Commercialisti.',
                'body'          => '<p>Grazie all\'accordo quadro con l\'Associazione Nazionale Commercialisti, Montagna Servizi offre alle Sezioni CAI l\'accesso a professionisti specializzati in fiscalità associativa a condizioni economiche agevolate rispetto al mercato.</p><h2>Cosa include</h2><ul><li>Contabilità e tenuta dei libri contabili</li><li>Dichiarazioni fiscali annuali</li><li>Bilancio civilistico e nota integrativa</li><li>Consulenza personalizzata su questioni fiscali specifiche</li><li>Assistenza in caso di controlli da parte dell\'Agenzia delle Entrate</li></ul><p><strong>Tariffa:</strong> tariffa minima di mercato con sconto del 30%, riservata alle Sezioni CAI clienti di Montagna Servizi.</p>',
                'sort_order'    => 2,
            ],
            [
                'category_slug' => 'consulenze',
                'slug'          => 'consulenza-legale',
                'title'         => 'Consulenza legale',
                'subtitle'      => 'Contratti, statuti, GDPR e tutela giuridica delle Sezioni CAI',
                'description'   => 'Offriamo consulenza legale specializzata su contratti, statuti, regolamenti interni, GDPR, responsabilità civile e rapporti con enti pubblici: tutto ciò che un direttivo CAI può trovarsi ad affrontare.',
                'body'          => '<p>Le Sezioni CAI si trovano sempre più spesso di fronte a sfide giuridiche complesse: dalla gestione dei contratti con istruttori e fornitori alla tutela della privacy dei soci, dalla responsabilità civile nelle attività alpinistiche ai rapporti con i Comuni per la concessione di spazi e contributi. Montagna Servizi mette a disposizione consulenti legali con esperienza nel diritto associativo e nello sport.</p><h2>Cosa include</h2><ul><li>Revisione e redazione di contratti (istruttori, fornitori, collaboratori)</li><li>Aggiornamento degli statuti sezionali</li><li>Regolamenti interni e discipline disciplinari</li><li>Adeguamento al GDPR e privacy policy</li><li>Consulenza su responsabilità civile nelle attività alpinistiche</li><li>Supporto nei rapporti con enti pubblici e CAI Centrale</li></ul>',
                'sort_order'    => 3,
            ],
            [
                'category_slug' => 'consulenze',
                'slug'          => 'webinar-tematici',
                'title'         => 'Webinar tematici',
                'subtitle'      => 'Formazione gratuita su Terzo Settore e normativa associativa',
                'description'   => 'Ogni due mesi organizziamo webinar gratuiti aperti a tutte le Sezioni CAI su temi di attualità normativa, fiscale e gestionale: un modo semplice per restare aggiornati senza costi aggiuntivi.',
                'body'          => '<p>La normativa che riguarda le Sezioni CAI è in continua evoluzione. Per questo Montagna Servizi organizza webinar gratuiti ogni due mesi su temi pratici e concreti: aggiornamenti fiscali, nuovi adempimenti ETS, gestione del personale volontario, GDPR e molto altro.</p><h2>Come funziona</h2><ul><li>Sessioni online su piattaforma Google Meet o Zoom (60–90 minuti)</li><li>Relatore esperto del settore (consulente MS o ospite esterno)</li><li>Sessione Q&A finale per domande specifiche</li><li>Registrazione disponibile per chi non può partecipare in diretta</li><li>Materiali di approfondimento inviati ai partecipanti</li></ul><p>I webinar sono gratuiti e aperti a tutte le Sezioni CAI, non solo ai clienti di Montagna Servizi. La frequenza è di uno ogni due mesi.</p>',
                'sort_order'    => 4,
            ],
            [
                'category_slug' => 'consulenze',
                'slug'          => 'lezioni-online',
                'title'         => 'Lezioni online su richiesta',
                'subtitle'      => 'Approfondimento personalizzato su temi specifici per la vostra Sezione',
                'description'   => 'Organizziamo sessioni formative online su misura per la vostra Sezione, su argomenti specifici scelti dal direttivo: dalla gestione contabile alla normativa ETS, dal GDPR alla rendicontazione dei bandi.',
                'body'          => '<p>Oltre ai webinar tematici aperti a tutti, Montagna Servizi offre sessioni formative personalizzate per singole Sezioni o Gruppi Regionali. Il format è flessibile: una o più ore di approfondimento su un tema specifico scelto dal direttivo, con un relatore esperto dedicato.</p><h2>Come funziona</h2><ul><li>Definizione del tema e degli obiettivi formativi con il direttivo</li><li>Sessione online (1–2 ore) in data e orario concordati</li><li>Materiali e slides inviati ai partecipanti dopo la sessione</li><li>Possibilità di follow-up via email per domande successive</li></ul><p>Le lezioni sono disponibili su qualsiasi tema connesso alla gestione associativa, fiscale, legale o comunicativa delle Sezioni CAI.</p>',
                'sort_order'    => 5,
            ],

            // ─── Fundraising ───────────────────────────────────────────────
            [
                'category_slug' => 'fundraising',
                'slug'          => 'monitoraggio-bandi',
                'title'         => 'Monitoraggio bandi',
                'subtitle'      => 'Sorveglianza continua di opportunità di finanziamento pubblico e privato',
                'description'   => 'Monitoriamo continuamente i bandi a livello europeo, nazionale e regionale per individuare le opportunità più adatte alla vostra Sezione: dal CAI Centrale ai Ministeri, dalle Fondazioni bancarie ai programmi UE.',
                'body'          => '<p>Il monitoraggio sistematico dei bandi è la base di una strategia di fundraising efficace. Il team di Montagna Servizi analizza ogni settimana decine di fonti — Gazzetta Ufficiale, siti delle Regioni, portali dei Ministeri, piattaforme UE, newsletter delle principali Fondazioni — per non perdere nessuna opportunità rilevante per le Sezioni CAI.</p><h2>Cosa include</h2><ul><li>Sorveglianza settimanale di oltre 40 fonti di finanziamento</li><li>Analisi di ammissibilità rispetto al profilo della vostra Sezione</li><li>Alert via email quando viene identificata un\'opportunità pertinente</li><li>Scheda di sintesi per ogni bando: scadenza, dotazione, cofinanziamento, requisiti</li><li>Report trimestrale con panoramica delle opportunità monitorate</li></ul><p><strong>Programmi monitorati:</strong> 8x1000, Erasmus+, Interreg, Alpine Space, bandi regionali (Piemonte, Lombardia, Toscana e altri), FUNT, Fondazione San Paolo, Fondazione con il Sud, contributi ministeriali.</p>',
                'sort_order'    => 1,
            ],
            [
                'category_slug' => 'fundraising',
                'slug'          => 'scrittura-proposte',
                'title'         => 'Scrittura proposte progettuali',
                'subtitle'      => 'Assistenza strategica nella preparazione di candidature a bandi',
                'description'   => 'Prepariamo la proposta progettuale completa per i bandi selezionati: dall\'idea alla candidatura formale, curando testi, budget, documentazione e la costruzione delle partnership necessarie.',
                'body'          => '<p>Una candidatura ben scritta aumenta significativamente le probabilità di successo. Il team di Montagna Servizi ha esperienza nella redazione di proposte progettuali per fondi europei, nazionali e regionali, e conosce le aspettative di ciascun ente erogatore.</p><h2>Cosa include</h2><ul><li>Sviluppo dell\'idea progettuale e definizione degli obiettivi</li><li>Redazione del formulario di candidatura (narrativo e tecnico)</li><li>Predisposizione del budget previsionale</li><li>Raccolta e verifica della documentazione amministrativa richiesta</li><li>Supporto alla costruzione di partnership con altri enti (se necessario)</li><li>Verifica finale e invio della candidatura entro i termini</li></ul>',
                'sort_order'    => 2,
            ],
            [
                'category_slug' => 'fundraising',
                'slug'          => 'accompagnamento-progetto',
                'title'         => 'Accompagnamento al progetto',
                'subtitle'      => 'Supporto operativo e logistico durante lo svolgimento delle attività',
                'description'   => 'Affianchiamo la vostra Sezione durante l\'esecuzione del progetto finanziato: supporto logistico, coordinamento delle attività, raccolta della documentazione e comunicazione con l\'ente erogatore.',
                'body'          => '<p>Ottenere il finanziamento è solo il primo passo. La gestione operativa del progetto — con le sue scadenze, i rapporti intermedi e le richieste di documentazione dell\'ente erogatore — richiede competenze e tempo. Montagna Servizi vi affianca per tutta la durata del progetto.</p><h2>Cosa include</h2><ul><li>Pianificazione operativa delle attività progettuali</li><li>Supporto logistico nell\'organizzazione degli eventi e delle attività</li><li>Raccolta e archiviazione della documentazione di spesa</li><li>Comunicazione periodica con l\'ente erogatore (rapporti intermedi)</li><li>Gestione delle eventuali variazioni di progetto</li></ul>',
                'sort_order'    => 3,
            ],
            [
                'category_slug' => 'fundraising',
                'slug'          => 'coordinamento-partner',
                'title'         => 'Coordinamento dei partner',
                'subtitle'      => 'Gestione delle relazioni tra capofila e partner di progetto',
                'description'   => 'Nei progetti multi-partner, Montagna Servizi gestisce il coordinamento tra tutti i soggetti coinvolti: comunicazione, scadenze, documentazione e coerenza delle attività rispetto al progetto approvato.',
                'body'          => '<p>I progetti europei e nazionali spesso richiedono la partecipazione di più enti in partenariato. Coordinarli efficacemente è determinante per il successo del progetto. Montagna Servizi assume il ruolo di project manager, garantendo che tutti i partner rispettino scadenze, producano la documentazione richiesta e contribuiscano agli obiettivi comuni.</p><h2>Cosa include</h2><ul><li>Definizione dei ruoli e delle responsabilità di ciascun partner</li><li>Comunicazione regolare con tutti i soggetti del partenariato</li><li>Monitoraggio del rispetto delle scadenze da parte dei partner</li><li>Raccolta e verifica della documentazione prodotta da ciascun partner</li><li>Supporto alla risoluzione di criticità durante l\'implementazione</li></ul>',
                'sort_order'    => 4,
            ],
            [
                'category_slug' => 'fundraising',
                'slug'          => 'rendicontazione',
                'title'         => 'Rendicontazione',
                'subtitle'      => 'Preparazione del report finanziario finale per l\'ente erogatore',
                'description'   => 'Prepariamo il report finanziario e narrativo finale del progetto, raccogliendo e verificando tutta la documentazione di spesa richiesta dall\'ente erogatore per ottenere il saldo del contributo.',
                'body'          => '<p>La rendicontazione è la fase più delicata di qualsiasi progetto finanziato. Un errore nella documentazione di spesa può portare alla riduzione o alla restituzione del contributo. Montagna Servizi gestisce l\'intero processo con la massima cura, garantendo una rendicontazione completa e corretta nei tempi previsti.</p><h2>Cosa include</h2><ul><li>Raccolta e verifica di tutta la documentazione di spesa (fatture, mandati, ricevute)</li><li>Redazione del report finanziario finale nel formato richiesto dall\'ente</li><li>Redazione del report narrativo delle attività svolte</li><li>Verifica della coerenza tra spese rendicontate e piano finanziario approvato</li><li>Gestione delle eventuali richieste di integrazioni da parte dell\'ente erogatore</li></ul>',
                'sort_order'    => 5,
            ],
        ];

        $keepSlugs = array_column($services, 'slug');
        Service::whereNotIn('slug', $keepSlugs)->delete();

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
