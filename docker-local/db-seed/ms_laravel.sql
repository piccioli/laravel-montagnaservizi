/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.6-MariaDB, for debian-linux-gnu (aarch64)
--
-- Host: localhost    Database: ms_laravel
-- ------------------------------------------------------
-- Server version	11.8.6-MariaDB-ubu2404

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `governance_members`
--

DROP TABLE IF EXISTS `governance_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `governance_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `mandate_info` varchar(255) DEFAULT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `governance_members`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `governance_members` WRITE;
/*!40000 ALTER TABLE `governance_members` DISABLE KEYS */;
INSERT INTO `governance_members` VALUES
(1,'Alessio Piccioli','Presidente','Alessio Piccioli coordina progetti legati a cartografia digitale, GIS, catasti sentieristici e piattaforme web per la gestione e valorizzazione del territorio montano. All\'interno del Club Alpino Italiano è stato Presidente della SOSEC e Presidente della Sezione CAI di Pisa per due mandati. Istruttore Nazionale di Scialpinismo e membro della Scuola Centrale di Scialpinismo del CAI. Laureato in Fisica con Dottorato di Ricerca in Astrofisica Particellare.','governance/gov-alessio-piccioli.webp','Triennio 2024–2027',1,1,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(2,'Enrico Sala','Consigliere','Laureato in Scienze Naturali, è Funzionario scientifico-tecnologico al Dipartimento di Bioscienze dell\'Università degli Studi di Milano, con competenze in GIS, cartografia tematica e botanica. Nel CAI ha ricoperto incarichi di rilievo: Presidente del Comitato Scientifico Lombardo, Presidente della Sezione di Como e Vicepresidente del CDR Lombardia. Consigliere di Montagna Servizi SCPA dal 2025.','governance/gov-enrico-sala.webp','Triennio 2024–2027',2,1,'2026-05-21 16:47:06','2026-05-27 19:58:35'),
(3,'Massimo Bonati','Consigliere','Massimo Bonati si occupa da oltre vent\'anni di progettazione europea, fundraising e gestione amministrativa di programmi pubblici, con consolidata esperienza nella Pubblica Amministrazione e nel Terzo Settore. Funzionario Amministrativo presso il Comune di Massa, ha ricoperto incarichi presso la Provincia della Spezia e svolto attività di consulenza e formazione in euro-progettazione per enti pubblici e associazioni. Membro del Consiglio di Amministrazione di Montagna Servizi SCPA dal 2025.','governance/gov-massimo-bonati.webp','Triennio 2024–2027',3,1,'2026-05-21 16:47:06','2026-05-27 19:56:47');
/*!40000 ALTER TABLE `governance_members` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_05_20_000001_add_role_to_users_table',1),
(5,'2026_05_20_000002_create_news_categories_table',1),
(6,'2026_05_20_000003_create_news_table',1),
(7,'2026_05_20_000004_create_services_table',1),
(8,'2026_05_20_000005_create_team_members_table',1),
(9,'2026_05_20_000006_create_governance_members_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news_category_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `body` longtext NOT NULL,
  `cover_image` varchar(500) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_slug_unique` (`slug`),
  KEY `news_news_category_id_foreign` (`news_category_id`),
  CONSTRAINT `news_news_category_id_foreign` FOREIGN KEY (`news_category_id`) REFERENCES `news_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES
(1,2,'Assemblea dei Delegati CAI 2026: appuntamento a Modena il 30 e 31 maggio','assemblea-delegati-cai-2026-modena','Il Club Alpino Italiano convoca l\'Assemblea dei Delegati 2026 a Modena, presso il BPER Forum \"Guido Monzani\". Due giornate dedicate alla vita associativa del CAI, tra bilanci, elezioni, cambiamenti climatici e futuro della montagna.','<p>Il Club Alpino Italiano ha ufficialmente convocato l\'Assemblea dei Delegati 2026, che si svolgerà sabato 30 e domenica 31 maggio presso l\'Auditorium del BPER Forum \"Guido Monzani\" di Modena.</p><p>L\'Assemblea rappresenta uno dei momenti più importanti della vita associativa del CAI, occasione di confronto e indirizzo strategico per il futuro dell\'associazione e delle sue strutture territoriali.</p><p>La giornata di sabato 30 maggio si aprirà con le attività istituzionali dedicate alla nomina del Presidente dell\'Assemblea e degli scrutatori, ai saluti degli ospiti e all\'approvazione del verbale dell\'Assemblea 2025. In programma anche importanti elezioni per il rinnovo di alcune cariche nazionali, tra cui il Vicepresidente Generale, i Probiviri Nazionali e i componenti del Comitato Elettorale.</p><p>Nel pomeriggio verranno affrontati i principali temi amministrativi e associativi, con la presentazione del Bilancio d\'esercizio 2025, la relazione annuale del Presidente Generale e gli interventi dei Delegati. Durante i lavori saranno inoltre conferiti riconoscimenti e onorificenze a figure di rilievo del mondo CAI.</p><p>La giornata di domenica 31 maggio sarà invece dedicata ad alcuni temi strategici per il futuro della montagna e dell\'associazione. Tra gli appuntamenti previsti figurano la relazione del prof. Greco sui cambiamenti climatici e la presentazione del \"Manifesto CAI per il futuro della Montagna\". È inoltre prevista la parte straordinaria dedicata alle modifiche allo Statuto del CAI.</p><p>A chiusura dell\'Assemblea saranno comunicati gli esiti delle votazioni e definite le quote associative per il 2027, oltre alla sede che ospiterà l\'Assemblea del prossimo anno.</p><p>Anche Montagna Servizi sarà presente all\'Assemblea dei Delegati con uno spazio dedicato all\'incontro con Delegati, Sezioni e Gruppi Regionali, per presentare i servizi e i progetti dedicati alla digitalizzazione e al supporto organizzativo del sistema CAI.</p>','news/news-assemblea-delegati-2026.webp','2026-05-21 09:00:00','2026-05-28 04:42:43','2026-05-28 04:42:43'),
(2,2,'CAI e Sentiero Italia CAI protagonisti all\'Italian Outdoor Festival 2026','cai-sentiero-italia-italian-outdoor-festival-2026','Il 9 e 10 maggio 2026 Montagna Servizi ha curato la presenza del Club Alpino Italiano all\'Italian Outdoor Festival di Milano, con uno stand dedicato al Sentiero Italia CAI. Due giornate con interesse concreto per il SICAI e la proiezione del documentario \"Endless Peaks\".','<p>Il 9 e 10 maggio 2026 Montagna Servizi ha curato la presenza del Club Alpino Italiano all\'Italian Outdoor Festival di Milano, allestendo e gestendo uno stand dedicato al Sentiero Italia CAI. Due giornate con profili di pubblico e dinamiche differenti, entrambe significative per la promozione del CAI e del suo progetto escursionistico più ambizioso.</p><h2>Sabato: lo stand al centro dell\'attenzione</h2><p>La giornata di sabato è stata quella con la maggiore affluenza. Fin dall\'apertura della fiera, lo stand ha attirato l\'interesse di molti visitatori, con domande concentrate su tre temi principali: il tracciato e le caratteristiche del Sentiero Italia, le modalità di iscrizione al CAI e i vantaggi associativi, le attività proposte dalle sezioni. Un pubblico con un\'età media stimata intorno ai 30-40 anni, in target sia per la diffusione della cultura escursionistica e alpinistica sia per l\'acquisizione di nuovi soci.</p><p>Lo stand era allestito con roll-up, bandiera e forex SICAI, guide e carte topografiche del Sentiero Italia, saggi e narrativa CAI, manuali di escursionismo e alpinismo, materiale promozionale e copie della Rivista CAI.</p><h2>Domenica: il documentario nel main stage</h2><p>La domenica, penalizzata dalla pioggia sul fronte affluenza alla fiera, ha offerto un momento di visibilità di segno diverso: nella mattinata è stato proiettato nel main stage il documentario \"Endless Peaks\" di Andrea Bandinelli con Francesco Tomé, produzione finanziata dal CAI. La proiezione ha riscosso buon interesse tra il pubblico presente, ampliando la presenza dell\'associazione oltre lo spazio fisico dello stand.</p><h2>Un bilancio positivo</h2><p>Il SICAI si conferma un progetto capace di generare interesse immediato non appena viene raccontato. L\'Italian Outdoor Festival rappresenta un contesto coerente con gli obiettivi di comunicazione del CAI: pubblico giovane, motivato, già orientato verso la montagna e l\'outdoor.</p>','news/news-italian-outdoor-festival-2026.webp','2026-05-21 09:00:00','2026-05-28 04:42:43','2026-05-28 04:42:43'),
(3,2,'Montagna Servizi alla fiera \"Fa\' la cosa giusta!\" — Milano, 13-15 marzo 2026','montagna-servizi-fa-la-cosa-giusta-2026','Dal 13 al 15 marzo 2026 Montagna Servizi ha partecipato alla fiera di Milano \"Fa\' la cosa giusta!\" all\'interno dello stand del Club Alpino Italiano, in un contesto dedicato alla sostenibilità, al turismo lento e alla cultura della montagna.','<p>Dal 13 al 15 marzo 2026 Montagna Servizi ha partecipato a \"Fa\' la cosa giusta! 2026\" all\'interno dello stand del Club Alpino Italiano, in un contesto dedicato alla sostenibilità, al turismo lento e alla cultura della montagna. Durante i tre giorni di fiera, lo spazio CAI è diventato un punto di incontro per soci, famiglie, scuole e appassionati, con attività rivolte a pubblici diversi e una forte attenzione alla divulgazione culturale ed educativa.</p><p>Montagna Servizi ha curato il supporto organizzativo e la gestione dello stand, contribuendo alla promozione dell\'editoria CAI attraverso la vendita di manuali, guide e pubblicazioni dedicate all\'alpinismo, all\'escursionismo, alla cultura della montagna e ai cammini.</p><p>Accanto all\'area editoriale, grande partecipazione hanno riscosso gli incontri e i laboratori per bambini promossi insieme a CAI Scuola, pensati per avvicinare le nuove generazioni ai temi dell\'educazione ambientale, della sostenibilità e della frequentazione consapevole della montagna.</p><p>Tra le attività più apprezzate dal pubblico anche la parete di arrampicata realizzata con il supporto della Società Escursionisti Milanesi, che ha permesso a bambini, ragazzi e visitatori di sperimentare in sicurezza un primo approccio all\'arrampicata, trasformando lo stand CAI in uno spazio dinamico e partecipato capace di coniugare cultura, sport e socialità.</p><p>L\'evento si conferma un\'importante opportunità di visibilità per il CAI e per Montagna Servizi, in un contesto fortemente orientato ai valori della sostenibilità e dell\'economia solidale.</p>','news/news-fa-la-cosa-giusta-2026.webp','2026-03-19 09:00:00','2026-05-28 04:42:43','2026-05-28 04:42:43'),
(4,2,'Il CAI al Salone Internazionale del Libro di Torino 2026','cai-salone-libro-torino-2026','Il Club Alpino Italiano, con il supporto operativo di Montagna Servizi, ha preso parte al Salone Internazionale del Libro 2026 di Torino. Incasso di € 6.186,70 con 411 articoli venduti, presentazioni editoriali e il contributo dei volontari della Sezione CAI Torino.','<p>Anche nel 2026 il Club Alpino Italiano, con il supporto organizzativo di Montagna Servizi, ha partecipato al Salone Internazionale del Libro di Torino, confermando l\'importanza della presenza del CAI in uno dei principali eventi culturali nazionali.</p><p>Lo stand CAI ha rappresentato uno spazio di incontro, divulgazione e promozione delle attività associative, attirando sia soci già vicini al Club Alpino Italiano sia nuovi visitatori interessati al mondo della montagna, dell\'escursionismo e della cultura alpina. Particolarmente apprezzato il contributo dei volontari della Sezione CAI Torino, che hanno supportato l\'accoglienza del pubblico e fornito informazioni sulle attività del territorio.</p><p>Grande interesse hanno suscitato le presentazioni editoriali organizzate presso la Sala della Montagna, dedicate ai volumi <em>Cose che capitano in montagna</em>, <em>Manuale di escursionismo base</em> e <em>Felik</em>, che hanno contribuito ad aumentare la partecipazione del pubblico e le vendite presso lo stand.</p><p>Nel complesso, lo stand CAI ha registrato un incasso di oltre € 6.186,70, con 411 articoli venduti — risultato superiore all\'edizione 2025 (€ 6.079,95 su 437 articoli) con un prezzo medio per articolo più alto, passato da circa € 13,91 nel 2025 a circa € 15,05 nel 2026. La giornata con maggiore affluenza ha registrato 119 articoli venduti e € 1.965,80 di incasso.</p><p>La partecipazione al Salone si conferma così un\'importante occasione per valorizzare il CAI non solo come realtà editoriale e culturale, ma anche come comunità associativa aperta al dialogo con il pubblico e il territorio.</p>','news/news-salone-libro-torino-2026.webp','2026-05-18 09:00:00','2026-05-28 04:42:43','2026-05-28 04:42:43'),
(5,3,'Montagna Servizi e Veryfico: la rivoluzione digitale per la gestione delle Sezioni','montagna-servizi-veryfico-gestione-digitale-sezioni','Grazie alla nuova partnership, le sezioni potranno accedere a un software gestionale e contabile all\'avanguardia, integrato con il tesseramento e pienamente conforme alla normativa ETS.','<p>L\'evoluzione normativa legata al Terzo Settore (ETS) ha introdotto sfide burocratiche e contabili sempre più complesse per le realtà associative. Per rispondere a queste esigenze, Montagna Servizi propone ufficialmente alle sezioni l\'adozione di Veryfico (www.veryfico.it), la piattaforma gestionale nata per semplificare la vita dei dirigenti associativi.</p><h2>Un\'unica piattaforma, infiniti vantaggi</h2><p>Il punto di forza dell\'operazione risiede nell\'integrazione. Veryfico non è solo un software di contabilità, ma un ecosistema digitale che, una volta collegato alla piattaforma del tesseramento, permette di sincronizzare automaticamente i dati dei soci, gestire la contabilità con bilanci e rendiconti conformi agli schemi ministeriali per gli ETS, e centralizzare ogni aspetto della vita sezionale in un unico ambiente cloud sicuro.</p><h2>Conformità e trasparenza</h2><p>Con l\'introduzione del RUNTS e delle nuove scadenze fiscali, avere uno strumento che guidi nella corretta imputazione delle voci di spesa non è più un lusso, ma una necessità. Veryfico è progettato per garantire che la contabilità sia sempre \"a prova di controllo\", sollevando i tesorieri da incertezze normative.</p><p>L\'obiettivo di Montagna Servizi è chiaro: fornire strumenti tecnologici che riducano il tempo dedicato alla burocrazia, restituendo spazio alla missione associativa e alla passione per la montagna. Con Veryfico siamo ormai vicini alle prime 100 installazioni: un segnale concreto della fiducia che le Sezioni CAI stanno ripponendo in questo percorso.</p>','news/news-veryfico-2026.webp','2026-05-21 09:00:00','2026-05-28 04:42:43','2026-05-28 04:42:43'),
(6,3,'Sentiero Italia CAI 2026: aggiornamenti, accreditamenti e il primo Premio Ambasciatori','sentiero-italia-cai-2026-aggiornamenti-premio-ambasciatori','Il Sentiero Italia CAI è protagonista di una fase di rivitalizzazione: nuovo portale con cartografia dinamica, procedura di accreditamento per le strutture ricettive, sviluppo territoriale con bandi europei e il lancio del Premio Annuale Ambasciatori del SICAI.','<p>Il Sentiero Italia CAI (SICAI) sta vivendo una fase di profonda rivitalizzazione. L\'obiettivo è elevare gli standard di fruizione lungo gli oltre 8.000 km di tracciato, rendendo l\'esperienza escursionistica più moderna, accessibile e integrata con i territori.</p><h2>Un nuovo portale per pianificare il percorso</h2><p>Il nuovo sito ufficiale è stato progettato per supportare l\'escursionista in ogni fase della pianificazione. Il cuore del portale è la cartografia dinamica, che permette una navigazione interattiva del sentiero con tracce GPS scaricabili per ogni singola tappa, filtri regionali per individuare eventi e iniziative locali, e strumenti ottimizzati per organizzare il proprio itinerario in autonomia.</p><h2>Accreditamento strutture e Passaporto del SICAI</h2><p>Il CAI ha definito una nuova procedura di accreditamento per le strutture ricettive, che include percorsi di formazione per gli operatori. Le strutture accreditate diventano i punti ufficiali per la timbratura del Passaporto del Sentiero Italia CAI — il nuovo documento ufficiale che certifica il percorso effettuato — ottenendo in cambio una maggiore visibilità sui canali ufficiali.</p><h2>Sviluppo territoriale e bandi</h2><p>Il Team del Sentiero Italia sta lavorando attivamente alla partecipazione a progetti europei, regionali e locali, con l\'obiettivo di finanziare interventi strutturali che facciano del sentiero un volano di sviluppo sostenibile per le aree interne.</p><h2>Il Premio Ambasciatori del Sentiero Italia CAI</h2><p>Nel 2026 è stata inaugurata la prima edizione del Premio Annuale Ambasciatori del Sentiero Italia CAI, un riconoscimento dedicato a coloro che si sono distinti per l\'impegno nella tutela e promozione del tracciato, confermando il SICAI come infrastruttura strategica per il turismo lento e la valorizzazione delle aree interne.</p>','news/news-sicai-2026.webp','2026-05-21 09:00:00','2026-05-28 04:42:43','2026-05-28 04:42:43'),
(7,3,'Nuove norme fiscali 2026 per gli Enti del Terzo Settore: cosa cambia per le Sezioni CAI','nuove-norme-fiscali-2026-enti-terzo-settore-sezioni-cai','Dal 1° gennaio 2026 sono entrate in vigore le nuove disposizioni fiscali in materia di imposte dirette per gli ETS. Le Sezioni e i Gruppi Regionali CAI devono verificare il proprio inquadramento e adeguare i comportamenti fiscali. A cura di Montagna Servizi SCPA.','<p>Con la pubblicazione in Gazzetta Ufficiale del Decreto Legge 17 giugno 2025 n. 84 è stata definita la data di entrata in vigore delle norme fiscali sulle imposte dirette introdotte dalla Riforma del Terzo Settore (D.Lgs. 117/2017): <strong>1° gennaio 2026</strong>. Gli effetti riguardano sia gli enti iscritti al RUNTS sia quelli che non si sono ancora iscritti o che non si iscriveranno.</p><h2>Attività di interesse generale: quando sono non commerciali?</h2><p>Ai sensi dell\'art. 79, comma 2, del D.Lgs. 117/2017, le attività statutarie istituzionali si considerano di natura non commerciale — e dunque non imponibili fiscalmente — quando sono svolte a titolo gratuito oppure dietro versamento di corrispettivi che non superino i costi effettivi. Esiste inoltre una clausola di \"piccolo margine\" (art. 79, comma 2-bis): le attività di interesse generale restano non commerciali qualora i ricavi non superino di oltre il 6% i relativi costi per ciascun esercizio e per non oltre tre esercizi consecutivi.</p><h2>Il vantaggio dell\'APS</h2><p>La forma giuridica più conveniente risulta essere quella dell\'Associazione di Promozione Sociale (APS), in quanto consente di non considerare fiscalmente rilevanti i corrispettivi specifici versati dagli associati — ad esempio i contributi per escursioni o corsi — indipendentemente dal margine realizzato. L\'assunzione della qualifica di APS è subordinata all\'iscrizione al RUNTS.</p><h2>Chi non entra nel RUNTS</h2><p>Le Sezioni e i GR che decidono di non iscriversi al RUNTS non potranno più beneficiare della defiscalizzazione dei corrispettivi specifici nei confronti degli associati, poiché la Riforma elimina questa agevolazione per le associazioni culturali e di promozione sociale non iscritte. Anche la Legge 398/1991 — applicata da molte Sezioni per la tassazione forfetaria dell\'attività commerciale — sarà applicabile dal 2026 soltanto dalle associazioni e società sportive dilettantistiche.</p><h2>La raccomandazione di Montagna Servizi</h2><p>Si raccomanda a ciascuna Sezione e Gruppo Regionale di analizzare compiutamente le proprie caratteristiche operative sotto il profilo fiscale e di pianificare per tempo la transizione alle nuove regole. Il nostro team è a disposizione per una consulenza dedicata.</p>',NULL,'2026-01-15 09:00:00','2026-05-28 04:42:43','2026-05-28 04:42:43'),
(8,3,'Proroga IVA 2026 per gli enti associativi: cosa cambia e cosa no per le Sezioni CAI','proroga-iva-2026-enti-associativi-sezioni-cai','Il Consiglio dei Ministri ha prorogato di 10 anni le norme IVA agevolate per gli enti associativi. Ma attenzione: le nuove regole sulle imposte dirette restano in vigore dal 2026. Le Sezioni CAI devono verificare con cura il proprio inquadramento fiscale.','<p>Il Consiglio dei Ministri ha approvato in via definitiva il decreto con cui sono state prorogate <strong>per dieci anni</strong> le nuove norme IVA previste per gli enti associativi. Il quadro IVA rimane dunque inalterato almeno sino al 31 dicembre 2035.</p><h2>Cosa cambia con la proroga IVA</h2><p>La proroga consente alle associazioni di continuare a considerare non soggette ad IVA le cessioni di beni e prestazioni di servizi in favore dei soci a fronte di corrispettivi specifici, effettuate in conformità alle finalità istituzionali. Tra le categorie che beneficiano di questa agevolazione figurano le Associazioni di Promozione Sociale (APS), qualifica che molte Sezioni CAI stanno assumendo per massimizzare i vantaggi fiscali.</p><p>Attenzione: le Sezioni che non assumono la qualifica di APS e non rientrano nelle altre categorie indicate <strong>non potranno beneficiare del regime di esclusione IVA</strong>. I corrispettivi per escursioni, corsi in palestra, corsi di scialpinismo e simili saranno considerati di natura commerciale e soggetti ad IVA al 22%.</p><h2>Le imposte dirette: nessuna proroga</h2><p>Sul fronte delle imposte dirette (IRES e IRAP), <strong>non è stata prevista alcuna proroga</strong>. Le Sezioni e i GR entrati nel Terzo Settore godranno della fiscalità agevolata degli ETS, considerando non commerciali le attività istituzionali qualora i ricavi non superino di oltre il 6% i costi per ciascuna annualità e per non oltre tre annualità consecutive. Per le APS, i corrispettivi specifici degli associati restano non commerciali indipendentemente dal margine.</p><p>Le Sezioni che restano fuori dal RUNTS perderanno invece la defiscalizzazione dei corrispettivi specifici e non potranno più applicare la Legge 398/1991 (regime forfetario) se non sono anche ASD o SSD.</p><h2>Il consiglio di Montagna Servizi</h2><p>Invitiamo ancora una volta le Sezioni e i GR a valutare con attenzione l\'opportunità di procedere all\'iscrizione al RUNTS: rinunciare alla qualifica di ETS potrebbe comportare un sensibile aggravio degli oneri fiscali. Il nostro team è a disposizione per supportare l\'analisi e il percorso di adeguamento.</p>',NULL,'2026-01-20 09:00:00','2026-05-28 04:42:43','2026-05-28 04:42:43'),
(9,3,'Il bilancio delle Sezioni CAI nel Terzo Settore: quale modello adottare','bilancio-sezioni-cai-terzo-settore-quale-modello','Con l\'ingresso nel RUNTS le Sezioni e i GR CAI sono obbligati a utilizzare uno dei modelli di bilancio ministeriali. La scelta tra bilancio ordinario e rendiconto per cassa dipende dai proventi annui e dal possesso della personalità giuridica. A cura di Montagna Servizi SCPA.','<p>È tempo di bilanci per le Sezioni e i Gruppi Regionali CAI iscritti al RUNTS (Registro Unico Nazionale del Terzo Settore). Ecco una guida pratica per orientarsi tra i modelli obbligatori e le scadenze da rispettare.</p><h2>Chi non è nel RUNTS</h2><p>Le Sezioni e i GR non iscritti al RUNTS non sono obbligati a utilizzare uno schema specifico di bilancio e possono proseguire con i modelli già adottati (criterio di cassa, di competenza o misto). Se dotati di personalità giuridica regionale, il bilancio approvato va depositato presso il Registro Regionale delle Persone Giuridiche.</p><h2>I modelli obbligatori per chi è nel RUNTS</h2><p>Le Sezioni e i GR iscritti al RUNTS devono utilizzare uno dei modelli di cui al Decreto del Ministero del Lavoro del 5 marzo 2020:</p><ul><li><strong>Modello ordinario</strong>: Stato Patrimoniale, Rendiconto Gestionale e Relazione di Missione (Modelli A, B, C).</li><li><strong>Rendiconto per Cassa</strong> (Modello D): documento unico, utilizzabile al ricorrere delle soglie di legge.</li></ul><h2>Quale modello scegliere: le quattro casistiche</h2><ul><li>ETS <strong>senza personalità giuridica</strong> con proventi ≤ €300.000: può usare il Rendiconto per Cassa.</li><li>ETS <strong>senza personalità giuridica</strong> con proventi &gt; €300.000: deve usare il bilancio ordinario.</li><li>ETS <strong>con personalità giuridica</strong> con proventi ≤ €60.000: può usare il Rendiconto per Cassa.</li><li>ETS <strong>con personalità giuridica</strong> con proventi &gt; €60.000: deve usare il bilancio ordinario.</li></ul><p>Il riferimento per i proventi è l\'esercizio precedente: per il bilancio 2025, si guarda ai proventi 2024.</p><h2>Scadenze e deposito</h2><p>Il bilancio va depositato in via telematica presso il RUNTS entro <strong>180 giorni dalla chiusura dell\'esercizio</strong> (il bilancio 2025 deve essere depositato entro il 29 giugno 2026). I documenti vanno convertiti in formato PDF/A; la firma digitale non è obbligatoria ma è necessario il possesso di SPID. Gli ETS con proventi annui superiori a €1.000.000 devono redigere e pubblicare anche il <strong>bilancio sociale</strong>.</p><h2>Un adempimento più oneroso, ma più trasparente</h2><p>Con l\'avvento della Riforma del Terzo Settore gli adempimenti di bilancio hanno assunto connotati formali e sostanziali più onerosi. La contropartita è la trasparenza garantita dalla pubblicazione dei dati nel RUNTS. Montagna Servizi supporta le Sezioni in tutti gli adempimenti contabili e di deposito: contattaci per una consulenza dedicata.</p>',NULL,'2026-02-07 09:00:00','2026-05-28 04:42:43','2026-05-28 04:42:43');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `news_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_categories`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `news_categories` WRITE;
/*!40000 ALTER TABLE `news_categories` DISABLE KEYS */;
INSERT INTO `news_categories` VALUES
(1,'Comunicazioni','comunicazioni','2026-05-21 16:47:06','2026-05-21 16:47:06'),
(2,'Eventi','eventi','2026-05-21 16:47:06','2026-05-21 16:47:06'),
(3,'Approfondimenti','approfondimenti','2026-05-21 16:47:06','2026-05-21 16:47:06');
/*!40000 ALTER TABLE `news_categories` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_slug` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(500) DEFAULT NULL,
  `description` text NOT NULL,
  `body` longtext NOT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`),
  KEY `services_category_slug_index` (`category_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES
(1,'segreteria-operativa','segreteria-a-distanza','Segreteria a distanza (SOAD)','Supporto amministrativo remoto per Sezioni e Gruppi Regionali','Gestiamo cartelle condivise, verbali di riunioni online, newsletter interne, raccolta dati via form e supporto ai contenuti web e social: tutto da remoto, senza bisogno di una risorsa in sede.','<p>Il servizio SOAD (Segreteria Operativa a Distanza) copre tutte le attività amministrative ordinarie che la vostra Sezione svolge quotidianamente: gestione della corrispondenza in entrata e in uscita, organizzazione di cartelle condivise, redazione di verbali delle riunioni online, controllo del budget di attività, invio di newsletter ai soci, raccolta di informazioni tramite form digitali e supporto alla produzione di contenuti per il sito web e i canali social.</p><p>Il servizio è modulare: ogni Sezione sceglie le attività di cui ha bisogno e il pacchetto più adatto alla propria dimensione.</p><h2>Cosa include</h2><ul><li>Gestione cartelle condivise (Google Drive / SharePoint)</li><li>Redazione verbali di assemblee e riunioni di consiglio</li><li>Controllo e rendiconto del budget attività</li><li>Invio newsletter ai soci tramite Brevo</li><li>Raccolta dati via form Typeform (iscrizioni, sondaggi)</li><li>Supporto ai contenuti web e social della Sezione</li></ul>',1,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(2,'segreteria-operativa','segreteria-in-presenza','Segreteria in presenza (SOAP)','Una risorsa dedicata presso la sede della Sezione','Una risorsa Montagna Servizi opera fisicamente presso la vostra sede per gestire l\'amministrazione ordinaria, i rapporti con soci e fornitori e le attività di segreteria fiscale e associativa.','<p>Il servizio SOAP (Segreteria Operativa in Presenza) è pensato per le Sezioni CAI e i Gruppi Regionali che necessitano di una figura dedicata presso la propria sede. La risorsa di Montagna Servizi gestisce in prima persona l\'intera operatività amministrativa: dalla ricezione della posta e dei visitatori alla gestione del registro soci, dall\'archiviazione documentale ai rapporti con l\'Agenzia delle Entrate e gli altri enti.</p><h2>Cosa include</h2><ul><li>Presidio fisico della segreteria nei giorni e negli orari concordati</li><li>Ricezione e gestione della corrispondenza ordinaria e PEC</li><li>Aggiornamento del registro soci e gestione delle quote</li><li>Rapporti con CAI Centrale, Gruppi Regionali e enti pubblici</li><li>Supporto agli adempimenti fiscali e associativi periodici</li></ul>',2,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(3,'segreteria-operativa','organizzazione-eventi','Organizzazione eventi','Supporto logistico e operativo per assemblee e riunioni','Pianifichiamo e coordiniamo assemblee ordinarie e straordinarie, riunioni di consiglio, eventi associativi e incontri istituzionali, gestendo ogni aspetto organizzativo dalla convocazione alla chiusura dei lavori.','<p>Dall\'assemblea annuale dei soci all\'evento di fine anno, ogni riunione richiede preparazione, coordinamento e documentazione. Il nostro servizio di organizzazione eventi si occupa di tutta la fase organizzativa, così il direttivo può concentrarsi sui contenuti.</p><h2>Cosa include</h2><ul><li>Predisposizione e invio delle convocazioni nel rispetto dello Statuto</li><li>Prenotazione e allestimento della sala (se necessario)</li><li>Preparazione dell\'ordine del giorno e dei materiali per i partecipanti</li><li>Supporto alla conduzione dei lavori (in presenza o da remoto)</li><li>Redazione e distribuzione del verbale finale</li><li>Gestione delle presenze e raccolta delle deleghe</li></ul>',3,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(4,'segreteria-operativa','gestione-documentale','Gestione documentale','Archiviazione, conservazione e organizzazione della documentazione','Organizziamo e conserviamo tutta la documentazione associativa — verbali, contratti, polizze, atti — in formato digitale sicuro, accessibile e conforme alle normative sulla conservazione dei documenti.','<p>Una documentazione ordinata è la base di una Sezione CAI ben gestita. Il servizio di gestione documentale di Montagna Servizi digitalizza, archivia e conserva tutti i documenti associativi in modo sicuro e facilmente consultabile, eliminando il rischio di perdita e semplificando i controlli da parte del Collegio dei Revisori o degli enti pubblici.</p><h2>Cosa include</h2><ul><li>Digitalizzazione e indicizzazione dei documenti esistenti</li><li>Archiviazione digitale strutturata su cloud condiviso</li><li>Conservazione dei verbali, contratti, polizze assicurative e atti societari</li><li>Gestione delle scadenze documentali (rinnovi, adempimenti periodici)</li><li>Accesso controllato per i membri del direttivo</li></ul><p>Il servizio è incluso nei pacchetti SOAD.</p>',4,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(5,'comunicazione','newsletter-associativa','Newsletter associativa','Comunicazione periodica ai soci via email','Progettiamo e inviamo newsletter periodiche ai soci della vostra Sezione tramite Brevo, con notizie, eventi e aggiornamenti redatti in modo chiaro e professionale.','<p>La newsletter è lo strumento più diretto per mantenere viva la relazione con i soci. Montagna Servizi si occupa di raccogliere i contenuti dal direttivo, redigerli in forma leggibile e inviarli con cadenza regolare tramite la piattaforma Brevo, già integrata con le liste di distribuzione della Sezione.</p><h2>Cosa include</h2><ul><li>Piano editoriale mensile concordato con il direttivo</li><li>Raccolta e redazione dei contenuti (eventi, comunicazioni, notizie)</li><li>Composizione grafica della newsletter (template con brand CAI)</li><li>Invio tramite Brevo con gestione delle iscrizioni e disiscrizioni</li><li>Report mensile di statistiche (aperture, click, disiscrizioni)</li></ul>',1,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(6,'comunicazione','raccolta-dati-form','Raccolta dati e form digitali','Form Typeform per iscrizioni, sondaggi e raccolta informazioni','Creiamo e gestiamo form digitali professionali per raccogliere iscrizioni a corsi ed eventi, sondaggi ai soci e richieste di informazioni, con i dati disponibili in tempo reale.','<p>Raccogliere dati in modo ordinato e senza errori è essenziale per qualsiasi Sezione CAI. Utilizziamo Typeform per creare form intuitivi e professionali, integrati con i fogli di calcolo o i sistemi già in uso dalla Sezione.</p><h2>Cosa include</h2><ul><li>Progettazione e creazione del form (iscrizioni, sondaggi, richieste)</li><li>Configurazione delle notifiche automatiche al compilatore e al direttivo</li><li>Integrazione con Google Sheets o altri strumenti di gestione dati</li><li>Raccolta e organizzazione delle risposte</li><li>Supporto all\'analisi dei dati raccolti</li></ul>',2,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(7,'comunicazione','supporto-web-social','Supporto web e social media','Contenuti per sito web e canali social della Sezione','Produciamo contenuti per il sito web e i canali social (Facebook, Instagram) della vostra Sezione, con un piano editoriale pensato per il pubblico CAI e il territorio di riferimento.','<p>Una presenza digitale curata aiuta la Sezione CAI ad attrarre nuovi soci, comunicare le attività e rafforzare il legame con il territorio. Montagna Servizi produce contenuti testuali e grafici su misura, coerenti con l\'identità visiva del CAI e con le specificità della vostra Sezione.</p><h2>Cosa include</h2><ul><li>Piano editoriale mensile per i canali social</li><li>Redazione e pubblicazione di post su Facebook e Instagram</li><li>Produzione di grafiche semplici (locandine eventi, annunci)</li><li>Aggiornamento delle pagine del sito web della Sezione</li><li>Monitoraggio delle metriche di base (reach, engagement)</li></ul>',3,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(8,'comunicazione','presenza-eventi-fiere','Presenza a eventi e fiere','Organizzazione e gestione stand per il CAI a fiere nazionali','Organizziamo e gestiamo la presenza del CAI ai principali eventi nazionali — Salone del Libro di Torino, Italian Outdoor Festival, Fa\' la cosa giusta! e altri — curando allestimento, materiali e comunicazione.','<p>Montagna Servizi coordina la partecipazione del Club Alpino Italiano ai principali eventi nazionali di settore e cultura. Dalla logistica dell\'allestimento alla produzione dei materiali promozionali, fino alla gestione del personale allo stand, ci occupiamo di tutto per permettere al CAI di farsi conoscere nel modo migliore.</p><h2>Cosa include</h2><ul><li>Scouting e selezione degli eventi più adatti agli obiettivi del CAI</li><li>Coordinamento con gli organizzatori dell\'evento per accrediti e spazi</li><li>Allestimento e gestione dello stand durante i giorni dell\'evento</li><li>Produzione di materiali promozionali (brochure, roll-up, gadget)</li><li>Presidio dello stand con personale Montagna Servizi o coordinamento dei volontari CAI</li><li>Report post-evento con dati di contatto raccolti e risultati</li></ul><p><strong>Esempi di eventi seguiti:</strong> Salone del Libro di Torino, Italian Outdoor Festival di Gardone Riviera, Fa\' la cosa giusta! di Milano, SICAI.</p>',4,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(9,'comunicazione','materiali-comunicazione','Materiali di comunicazione','Produzione di materiali promozionali e istituzionali','Supportiamo la produzione di materiali di comunicazione — brochure, locandine, comunicati stampa, presentazioni — coerenti con le linee guida visive del Club Alpino Italiano.','<p>Ogni Sezione CAI ha bisogno di materiali di comunicazione professionali per presentarsi al territorio, comunicare i propri servizi e promuovere le attività. Montagna Servizi supporta la produzione di questi materiali, garantendo coerenza con l\'identità visiva del CAI e qualità dei contenuti.</p><h2>Cosa include</h2><ul><li>Brochure istituzionali e di presentazione dei servizi</li><li>Locandine e manifesti per eventi e corsi</li><li>Comunicati stampa per media locali e nazionali</li><li>Presentazioni PowerPoint per assemblee e incontri istituzionali</li><li>Template riutilizzabili per comunicazioni ricorrenti</li></ul>',5,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(10,'contabilita-veryfico','veryfico-mini','Veryfico Mini','Contabilità di cassa per Sezioni con esigenze semplici','Il piano d\'ingresso di Veryfico: contabilità di cassa completa, senza anagrafica soci né modulo rimborsi. Ideale per Sezioni con volumi ridotti e gestione semplice.','<p>Veryfico Mini è la soluzione ideale per le Sezioni CAI più piccole o con una gestione contabile semplice. Include la contabilità di cassa con il piano dei conti standard CAI, la produzione del rendiconto annuale e l\'accesso tramite My CAI.</p><h2>Cosa include</h2><ul><li>Contabilità di cassa con piano dei conti CAI</li><li>Rendiconto annuale per l\'assemblea dei soci</li><li>Accesso con credenziali My CAI</li><li>Conservazione documenti su cloud</li><li>Supporto all\'adozione e webinar di onboarding</li></ul><p><strong>Non include:</strong> anagrafica soci, sincronizzazione piattaforma CAI, modulo rimborsi.</p>',1,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(11,'contabilita-veryfico','veryfico-premium','Veryfico Premium','Anagrafica soci, rimborsi e sincronizzazione con la piattaforma CAI','La soluzione più scelta dalle Sezioni CAI: anagrafica soci integrata, sincronizzazione con la piattaforma CAI, modulo rimborsi spese e contabilità di cassa completa.','<p>Veryfico Premium aggiunge alle funzioni del piano Mini la gestione completa dell\'anagrafica soci, la sincronizzazione automatica con la piattaforma nazionale CAI e il modulo per la gestione dei rimborsi spese ai soci. È la scelta ideale per la maggior parte delle Sezioni.</p><h2>Cosa include</h2><ul><li>Tutto il piano Mini</li><li>Anagrafica soci con storico quote e dati personali</li><li>Sincronizzazione bidirezionale con la piattaforma CAI</li><li>Modulo rimborsi spese per escursioni e attività</li><li>Report personalizzabili per il direttivo</li></ul>',2,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(12,'contabilita-veryfico','veryfico-maxi','Veryfico Maxi','Contabilità per competenza e bilancio sociale per Sezioni strutturate','Il piano completo: contabilità per competenza, gestione del bilancio sociale ETS, tutto l\'anagrafica e il modulo rimborsi. Per Sezioni con obbligo di bilancio ETS o esigenze contabili avanzate.','<p>Veryfico Maxi è pensato per le Sezioni CAI di maggiori dimensioni o con obbligo di redazione del bilancio sociale ai sensi del Codice del Terzo Settore. Aggiunge ai piani inferiori la contabilità per competenza e il modulo per la redazione del bilancio sociale.</p><h2>Cosa include</h2><ul><li>Tutto il piano Premium</li><li>Contabilità per competenza (obbligatoria sopra determinate soglie ETS)</li><li>Modulo bilancio sociale conforme al Codice del Terzo Settore</li><li>Prospetto delle variazioni patrimoniali</li><li>Supporto alla predisposizione della documentazione per il Collegio dei Revisori</li></ul>',3,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(13,'contabilita-veryfico','consulenza-veryfico','Consulenza e supporto Veryfico','Accompagnamento all\'adozione e all\'uso quotidiano della piattaforma','Affianchiamo la vostra Sezione nell\'adozione di Veryfico: configurazione iniziale, migrazione dei dati, formazione del tesoriere e supporto continuativo per qualsiasi dubbio operativo.','<p>L\'adozione di un nuovo software contabile può sembrare complessa. Montagna Servizi affianca ogni Sezione passo dopo passo: dalla configurazione iniziale dell\'account alla migrazione dei dati storici, fino alla formazione del tesoriere e al supporto operativo nel corso dell\'anno.</p><h2>Cosa include</h2><ul><li>Configurazione iniziale dell\'account Veryfico</li><li>Migrazione dei dati dalla contabilità precedente</li><li>Sessione di formazione dedicata per il tesoriere (webinar)</li><li>Supporto continuativo via email per quesiti operativi</li><li>Aggiornamento sulle novità della piattaforma</li></ul><p>Il supporto base è incluso in tutti i piani Veryfico acquistati tramite Montagna Servizi.</p>',4,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(14,'contabilita-veryfico','dichiarazioni-fiscali','Dichiarazioni fiscali e adempimenti ETS','Modello EAS, dichiarazioni annuali e adempimenti periodici','Gestiamo gli adempimenti fiscali periodici della vostra Sezione: Modello EAS, dichiarazione dei redditi, comunicazioni RUNTS e tutti gli obblighi previsti dal Codice del Terzo Settore.','<p>Le Sezioni CAI sono enti del Terzo Settore soggetti a una serie di adempimenti fiscali e normativi che cambiano di anno in anno. Montagna Servizi, in collaborazione con i propri consulenti fiscali convenzionati, gestisce tutti gli obblighi periodici con la massima cura e nei tempi previsti dalla legge.</p><h2>Cosa include</h2><ul><li>Presentazione del Modello EAS (variazioni dati)</li><li>Dichiarazione dei redditi annuale (Modello Redditi ENC)</li><li>Comunicazioni e aggiornamenti al Registro Unico del Terzo Settore (RUNTS)</li><li>Gestione dell\'obbligo di bilancio sociale (se applicabile)</li><li>Monitoraggio delle scadenze fiscali e invio promemoria al direttivo</li></ul>',5,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(15,'consulenze','consulenza-terzo-settore','Consulenza Terzo Settore','Supporto alla trasformazione ETS e agli adempimenti statutari','Analizziamo la situazione della vostra Sezione rispetto al Codice del Terzo Settore e vi supportiamo in tutte le fasi: trasformazione ETS, adeguamento statutario, bilanci e comunicazioni al RUNTS.','<p>Il Codice del Terzo Settore ha profondamente cambiato il quadro normativo per le associazioni come le Sezioni CAI. Montagna Servizi offre un servizio di consulenza specializzata per aiutare ogni Sezione a comprendere i propri obblighi e adeguarsi con serenità.</p><h2>Cosa include</h2><ul><li>Analisi della situazione attuale rispetto agli obblighi ETS</li><li>Supporto all\'adeguamento dello statuto sezionale</li><li>Accompagnamento nella procedura di iscrizione al RUNTS</li><li>Predisposizione del bilancio sociale (se obbligatorio)</li><li>Consulenza sugli adempimenti periodici (assemblee, rinnovo cariche)</li></ul>',1,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(16,'consulenze','consulenza-commercialista','Consulenza commercialista','Contabilità, dichiarazioni fiscali e bilancio con tariffe convenzionate','Accedete a consulenze commercialistiche specializzate in associazionismo e Terzo Settore a tariffe convenzionate, grazie all\'accordo di Montagna Servizi con l\'Associazione Nazionale Commercialisti.','<p>Grazie all\'accordo quadro con l\'Associazione Nazionale Commercialisti, Montagna Servizi offre alle Sezioni CAI l\'accesso a professionisti specializzati in fiscalità associativa a condizioni economiche agevolate rispetto al mercato.</p><h2>Cosa include</h2><ul><li>Contabilità e tenuta dei libri contabili</li><li>Dichiarazioni fiscali annuali</li><li>Bilancio civilistico e nota integrativa</li><li>Consulenza personalizzata su questioni fiscali specifiche</li><li>Assistenza in caso di controlli da parte dell\'Agenzia delle Entrate</li></ul><p><strong>Tariffa:</strong> tariffa minima di mercato con sconto del 30%, riservata alle Sezioni CAI clienti di Montagna Servizi.</p>',2,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(17,'consulenze','consulenza-legale','Consulenza legale','Contratti, statuti, GDPR e tutela giuridica delle Sezioni CAI','Offriamo consulenza legale specializzata su contratti, statuti, regolamenti interni, GDPR, responsabilità civile e rapporti con enti pubblici: tutto ciò che un direttivo CAI può trovarsi ad affrontare.','<p>Le Sezioni CAI si trovano sempre più spesso di fronte a sfide giuridiche complesse: dalla gestione dei contratti con istruttori e fornitori alla tutela della privacy dei soci, dalla responsabilità civile nelle attività alpinistiche ai rapporti con i Comuni per la concessione di spazi e contributi. Montagna Servizi mette a disposizione consulenti legali con esperienza nel diritto associativo e nello sport.</p><h2>Cosa include</h2><ul><li>Revisione e redazione di contratti (istruttori, fornitori, collaboratori)</li><li>Aggiornamento degli statuti sezionali</li><li>Regolamenti interni e discipline disciplinari</li><li>Adeguamento al GDPR e privacy policy</li><li>Consulenza su responsabilità civile nelle attività alpinistiche</li><li>Supporto nei rapporti con enti pubblici e CAI Centrale</li></ul>',3,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(18,'consulenze','webinar-tematici','Webinar tematici','Formazione gratuita su Terzo Settore e normativa associativa','Ogni due mesi organizziamo webinar gratuiti aperti a tutte le Sezioni CAI su temi di attualità normativa, fiscale e gestionale: un modo semplice per restare aggiornati senza costi aggiuntivi.','<p>La normativa che riguarda le Sezioni CAI è in continua evoluzione. Per questo Montagna Servizi organizza webinar gratuiti ogni due mesi su temi pratici e concreti: aggiornamenti fiscali, nuovi adempimenti ETS, gestione del personale volontario, GDPR e molto altro.</p><h2>Come funziona</h2><ul><li>Sessioni online su piattaforma Google Meet o Zoom (60–90 minuti)</li><li>Relatore esperto del settore (consulente MS o ospite esterno)</li><li>Sessione Q&A finale per domande specifiche</li><li>Registrazione disponibile per chi non può partecipare in diretta</li><li>Materiali di approfondimento inviati ai partecipanti</li></ul><p>I webinar sono gratuiti e aperti a tutte le Sezioni CAI, non solo ai clienti di Montagna Servizi. La frequenza è di uno ogni due mesi.</p>',4,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(19,'consulenze','lezioni-online','Lezioni online su richiesta','Approfondimento personalizzato su temi specifici per la vostra Sezione','Organizziamo sessioni formative online su misura per la vostra Sezione, su argomenti specifici scelti dal direttivo: dalla gestione contabile alla normativa ETS, dal GDPR alla rendicontazione dei bandi.','<p>Oltre ai webinar tematici aperti a tutti, Montagna Servizi offre sessioni formative personalizzate per singole Sezioni o Gruppi Regionali. Il format è flessibile: una o più ore di approfondimento su un tema specifico scelto dal direttivo, con un relatore esperto dedicato.</p><h2>Come funziona</h2><ul><li>Definizione del tema e degli obiettivi formativi con il direttivo</li><li>Sessione online (1–2 ore) in data e orario concordati</li><li>Materiali e slides inviati ai partecipanti dopo la sessione</li><li>Possibilità di follow-up via email per domande successive</li></ul><p>Le lezioni sono disponibili su qualsiasi tema connesso alla gestione associativa, fiscale, legale o comunicativa delle Sezioni CAI.</p>',5,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(20,'fundraising','monitoraggio-bandi','Monitoraggio bandi','Sorveglianza continua di opportunità di finanziamento pubblico e privato','Monitoriamo continuamente i bandi a livello europeo, nazionale e regionale per individuare le opportunità più adatte alla vostra Sezione: dal CAI Centrale ai Ministeri, dalle Fondazioni bancarie ai programmi UE.','<p>Il monitoraggio sistematico dei bandi è la base di una strategia di fundraising efficace. Il team di Montagna Servizi analizza ogni settimana decine di fonti — Gazzetta Ufficiale, siti delle Regioni, portali dei Ministeri, piattaforme UE, newsletter delle principali Fondazioni — per non perdere nessuna opportunità rilevante per le Sezioni CAI.</p><h2>Cosa include</h2><ul><li>Sorveglianza settimanale di oltre 40 fonti di finanziamento</li><li>Analisi di ammissibilità rispetto al profilo della vostra Sezione</li><li>Alert via email quando viene identificata un\'opportunità pertinente</li><li>Scheda di sintesi per ogni bando: scadenza, dotazione, cofinanziamento, requisiti</li><li>Report trimestrale con panoramica delle opportunità monitorate</li></ul><p><strong>Programmi monitorati:</strong> 8x1000, Erasmus+, Interreg, Alpine Space, bandi regionali (Piemonte, Lombardia, Toscana e altri), FUNT, Fondazione San Paolo, Fondazione con il Sud, contributi ministeriali.</p>',1,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(21,'fundraising','scrittura-proposte','Scrittura proposte progettuali','Assistenza strategica nella preparazione di candidature a bandi','Prepariamo la proposta progettuale completa per i bandi selezionati: dall\'idea alla candidatura formale, curando testi, budget, documentazione e la costruzione delle partnership necessarie.','<p>Una candidatura ben scritta aumenta significativamente le probabilità di successo. Il team di Montagna Servizi ha esperienza nella redazione di proposte progettuali per fondi europei, nazionali e regionali, e conosce le aspettative di ciascun ente erogatore.</p><h2>Cosa include</h2><ul><li>Sviluppo dell\'idea progettuale e definizione degli obiettivi</li><li>Redazione del formulario di candidatura (narrativo e tecnico)</li><li>Predisposizione del budget previsionale</li><li>Raccolta e verifica della documentazione amministrativa richiesta</li><li>Supporto alla costruzione di partnership con altri enti (se necessario)</li><li>Verifica finale e invio della candidatura entro i termini</li></ul>',2,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(22,'fundraising','accompagnamento-progetto','Accompagnamento al progetto','Supporto operativo e logistico durante lo svolgimento delle attività','Affianchiamo la vostra Sezione durante l\'esecuzione del progetto finanziato: supporto logistico, coordinamento delle attività, raccolta della documentazione e comunicazione con l\'ente erogatore.','<p>Ottenere il finanziamento è solo il primo passo. La gestione operativa del progetto — con le sue scadenze, i rapporti intermedi e le richieste di documentazione dell\'ente erogatore — richiede competenze e tempo. Montagna Servizi vi affianca per tutta la durata del progetto.</p><h2>Cosa include</h2><ul><li>Pianificazione operativa delle attività progettuali</li><li>Supporto logistico nell\'organizzazione degli eventi e delle attività</li><li>Raccolta e archiviazione della documentazione di spesa</li><li>Comunicazione periodica con l\'ente erogatore (rapporti intermedi)</li><li>Gestione delle eventuali variazioni di progetto</li></ul>',3,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(23,'fundraising','coordinamento-partner','Coordinamento dei partner','Gestione delle relazioni tra capofila e partner di progetto','Nei progetti multi-partner, Montagna Servizi gestisce il coordinamento tra tutti i soggetti coinvolti: comunicazione, scadenze, documentazione e coerenza delle attività rispetto al progetto approvato.','<p>I progetti europei e nazionali spesso richiedono la partecipazione di più enti in partenariato. Coordinarli efficacemente è determinante per il successo del progetto. Montagna Servizi assume il ruolo di project manager, garantendo che tutti i partner rispettino scadenze, producano la documentazione richiesta e contribuiscano agli obiettivi comuni.</p><h2>Cosa include</h2><ul><li>Definizione dei ruoli e delle responsabilità di ciascun partner</li><li>Comunicazione regolare con tutti i soggetti del partenariato</li><li>Monitoraggio del rispetto delle scadenze da parte dei partner</li><li>Raccolta e verifica della documentazione prodotta da ciascun partner</li><li>Supporto alla risoluzione di criticità durante l\'implementazione</li></ul>',4,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(24,'fundraising','rendicontazione','Rendicontazione','Preparazione del report finanziario finale per l\'ente erogatore','Prepariamo il report finanziario e narrativo finale del progetto, raccogliendo e verificando tutta la documentazione di spesa richiesta dall\'ente erogatore per ottenere il saldo del contributo.','<p>La rendicontazione è la fase più delicata di qualsiasi progetto finanziato. Un errore nella documentazione di spesa può portare alla riduzione o alla restituzione del contributo. Montagna Servizi gestisce l\'intero processo con la massima cura, garantendo una rendicontazione completa e corretta nei tempi previsti.</p><h2>Cosa include</h2><ul><li>Raccolta e verifica di tutta la documentazione di spesa (fatture, mandati, ricevute)</li><li>Redazione del report finanziario finale nel formato richiesto dall\'ente</li><li>Redazione del report narrativo delle attività svolte</li><li>Verifica della coerenza tra spese rendicontate e piano finanziario approvato</li><li>Gestione delle eventuali richieste di integrazioni da parte dell\'ente erogatore</li></ul>',5,'2026-05-21 16:47:06','2026-05-21 16:47:06');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES
('87v4RTyP3FxlOmm3U6TOwco8NFebW2fQeY8fAC5s',NULL,'192.168.65.1','curl/8.7.1','eyJfdG9rZW4iOiJQc0txSWxjQzNQcWdyYTNqM3hCeXUxdGVUWG80V3hQSDhBYlM1VEdBIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9wcml2YWN5LXBvbGljeSIsInJvdXRlIjoicHJpdmFjeS1wb2xpY3kifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779944897),
('eVyHZeyeg3UNYOXKQmpaCkwNAhiII9co3f2Au4mt',NULL,'192.168.65.1','curl/8.7.1','eyJfdG9rZW4iOiJRbHFnNWp0MTBscVpmU3VwS2VqNk1rOEZNc1VyRVBhOGZaWjFJYjNiIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9ub3RlLWxlZ2FsaSIsInJvdXRlIjoibm90ZS1sZWdhbGkifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779944897),
('KCY7K0Tm9jk4b79nQjPqsVoWSruHneKU5WtKiEhX',NULL,'192.168.65.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJMNGVsbkdIQ043QTgzeVhNUXdUTkEwd3VBOUxiYU1QeG9OY0dCWnB4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDgwXC9jaGktc2lhbW8iLCJyb3V0ZSI6ImNoaS1zaWFtbyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1779945365),
('nDzpUu297AknrGKDDXymZQWArBljRWt72et84upi',NULL,'192.168.65.1','curl/8.7.1','eyJfdG9rZW4iOiJBUHFWcnNtbkNybGFPUUlQcXJGY2ZRMzNWMVF6dThiWnVwYVpTNlBkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9ub3RlLWxlZ2FsaSIsInJvdXRlIjoibm90ZS1sZWdhbGkifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779944900),
('S3eIAzi3r7bfkFhWHu4bAVkyb0nSBBK3L9fn1h2p',NULL,'192.168.65.1','curl/8.7.1','eyJfdG9rZW4iOiJEODl3YmJCN3o5UDhXYThSTTdTNUJSQzlUT1E0WGZHZW9aOFh6SEdaIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9jb29raWUtcG9saWN5Iiwicm91dGUiOiJjb29raWUtcG9saWN5In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1779944900),
('U4spZiA9OwAPeVOGdm7CAWIpARKMb6S0qZtgZGOz',NULL,'192.168.65.1','curl/8.7.1','eyJfdG9rZW4iOiJLRGhkV0c4MG9jNElVWEZ6RktMZnRNVFRnYTBRYjdWQ0YwaTZzdHJiIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9jb250YXR0aT9zb3VyY2U9ZnVuZHJhaXNpbmciLCJyb3V0ZSI6ImNvbnRhdHRpIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1779941064),
('utQ2Ushm5hz1B3yL4wrxMM73wNg4t3LAkETkgNGJ',NULL,'192.168.65.1','curl/8.7.1','eyJfdG9rZW4iOiI0RWJPV0szd2p4b3NaT3p6NXlZTDByM2M4OWxOc3B3NTNIYklpT2VqIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9jb29raWUtcG9saWN5Iiwicm91dGUiOiJjb29raWUtcG9saWN5In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1779944897),
('wcFfKgCi9GDKccyLfDT74vR4YYAXyyneGSYOt3kj',NULL,'192.168.65.1','curl/8.7.1','eyJfdG9rZW4iOiJZQ1lMaTRhbkpXZXNFZW9DdEUzVXh0eG9oYnh0UE9ZaWtJbWdzV3RBIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9jb250YXR0aT9zb3VyY2U9ZnVuZHJhaXNpbmciLCJyb3V0ZSI6ImNvbnRhdHRpIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1779941078),
('XKnxoVBRE9fnwFeWw6fJjPiesiglI13E85A2LW80',NULL,'192.168.65.1','curl/8.7.1','eyJfdG9rZW4iOiJIT1RSNzhHN3VUSUcxNURKSnRub2FWVXJKWG13Uk40N0gySEZLRElpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9jb250YXR0aSIsInJvdXRlIjoiY29udGF0dGkifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779941064),
('yUrqhMOJ6s36AZDQjo4Mrh8ObXMTlD3aae27a3h9',NULL,'192.168.65.1','curl/8.7.1','eyJfdG9rZW4iOiJ2WE9ZZkNnM2o1VWlWS2cyYUZQc1pRY3hTNXEzVjRyT1VYbFdiV1ZqIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9wcml2YWN5LXBvbGljeSIsInJvdXRlIjoicHJpdmFjeS1wb2xpY3kifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779944900);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `team_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
INSERT INTO `team_members` VALUES
(1,'Riccardo Bernasconi','Segreteria e gestione eventi','Riccardo Bernasconi si occupa di processi amministrativi, segreteria a supporto delle commissioni centrali CAI e organizzazione di eventi. Membro del Consiglio Direttivo di GEA Piemonte, opera come guida ambientale escursionistica in collaborazione con Ossola Outdoor School. Laureato in Storia all\'Università degli Studi di Milano, ha conseguito un Master di II livello in Management dei Beni e delle Attività Culturali presso Ca\' Foscari di Venezia e ESCP di Parigi (doppio titolo italiano-francese).','team/team-riccardo-bernasconi.webp',1,1,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(2,'Mattia Bianchi','Consulenze specialistiche e Veryfico','Mattia Bianchi si occupa della gestione amministrativa interna di Montagna Servizi e segue le consulenze specialistiche alle Sezioni CAI nell\'ambito del Terzo Settore. Coordina il lancio del software gestionale e contabile Veryfico alle Sezioni, mantenendo i rapporti con gli sviluppatori e fornendo consulenza di primo livello.','team/team-mattia-bianchi.webp',2,1,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(3,'Lorena Sava','Segreteria Generale e Sentiero Italia CAI','Lorena Sava si occupa della Segreteria Generale di Montagna Servizi, con particolare riferimento alla gestione delle segreterie delle OTC e delle SO del Club Alpino Italiano, della segreteria del Sentiero Italia CAI e della Cineteca CAI. Gestisce documentazione, verbali, newsletter, raccolta dati e organizzazione di riunioni ed eventi, con competenze su Suite Google, Microsoft Office, Typeform, Brevo, Canva e WordPress.','team/team-lorena-sava.webp',3,1,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(4,'Sara Mariani','Progettazione e fundraising','Sara Mariani si occupa di progettazione e coordinamento tecnico-amministrativo di progetti finanziati in ambito culturale, educativo, ambientale e sportivo, con particolare riferimento a bandi regionali, nazionali ed europei. Supporta la costruzione del partenariato, la redazione di proposte progettuali, la pianificazione delle attività, la gestione documentale e la rendicontazione. Coordina le relazioni istituzionali tra enti, associazioni e stakeholder territoriali.','team/team-sara-mariani.webp',4,1,'2026-05-21 16:47:06','2026-05-21 16:47:06'),
(5,'Eleonora Berti','Sentiero Italia CAI e sviluppo europeo','Eleonora Berti supporta Montagna Servizi nelle attività di progettazione e sviluppo strategico legate al Sentiero Italia CAI, contribuendo al consolidamento delle iniziative territoriali promosse dai Gruppi Regionali e dalle Sezioni. Grazie alla sua esperienza internazionale nel campo degli itinerari culturali europei e della cooperazione territoriale, contribuisce all\'individuazione di opportunità di finanziamento e allo sviluppo di reti collaborative a livello nazionale ed europeo.','team/team-eleonora-berti.webp',5,1,'2026-05-21 16:47:06','2026-05-21 16:47:06');
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Admin','admin@montagnaservizi.com',NULL,'$2y$12$dMLHXtHhXeEdUH0GFfCOhu/FCUGrpsvobTBweOBgMw.J4TXLNASgK','admin',NULL,'2026-05-21 16:47:06','2026-05-21 16:47:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-05-28  5:16:21
