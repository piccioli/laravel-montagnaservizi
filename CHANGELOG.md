# Changelog

Tutte le modifiche rilevanti al progetto sono documentate in questo file.

Il formato segue [Keep a Changelog](https://keepachangelog.com/it/1.0.0/).
Il versionamento segue [Semantic Versioning](https://semver.org/lang/it/):
`MAJOR.MINOR.PATCH` — versioni `0.x.x` fino al go-live.

---

## [Unreleased]

---

## [0.6.1] — 2026-05-28

### Fixed
- Deploy UAT: `TYPEFORM_FORM_ID` ora iniettato in `.env.uat` (non `.env`) — il container PHP-FPM usa `env_file: .env.uat`, il `sed` precedente modificava il file sbagliato
- Aggiunto fallback `echo >>` per il caso in cui la riga non esista ancora in `.env.uat`

---

## [0.6.0] — 2026-05-28

### Added
- Blog di lancio: 9 articoli reali nel `NewsSeeder` (4 in categoria "eventi", 5 in "approfondimenti")
  - Eventi: Assemblea Delegati Modena, Italian Outdoor Festival, Fa' la Cosa Giusta, Salone del Libro Torino
  - Approfondimenti: Veryfico gestione digitale, SICAI 2026, norme fiscali ETS, proroga IVA, bilancio sezioni CAI
- `progettazione/fase6/screenshots/` — directory per screenshot di fase (da popolare manualmente)
- Report di chiusura Fase 6 (`progettazione/report_fasi/2026_MS_sitoweb_report_fase_6.md`)

### Changed
- Privacy Policy: aggiunta sezione newsletter Brevo, Typeform come responsabile esterno, data aggiornamento
- Cookie Policy: dettaglio cookie tecnici Laravel, link policy Typeform, sezione titolare con sede
- Note Legali: sede reale Via Petrella 19 Milano, foro Milano, sezione link esterni, sezione contatti
- Footer: sede legale reale "Via Petrella 19 — Milano", rimosso placeholder REA
- `NewsSeeder`: rimosso pattern delete+insert, sostituito con `truncate()` per reset pulito ad ogni run
- `DatabaseSeeder`: rimosso `NewsDemoSeeder::class` (40 news placeholder eliminate definitivamente)
- DB seed locale (`docker-local/db-seed/ms_laravel.sql`) aggiornato con contenuti Fase 6

---

## [0.5.3] — 2026-05-28

### Added
- Pagina `/contatti` con Typeform embedded (header/footer del sito, body = form a tutta altezza)
- `ContattiController` e route `GET /contatti` con parametro `?source=` per il tracking
- CSS `.ms-typeform-wrapper` / `.ms-typeform-iframe` per layout full-height

### Changed
- Tutti i CTA di contatto (header desktop+mobile, home, servizi, 5 pagine categoria, dettaglio servizio, articolo news) aggiornati da link esterno Typeform a link interno `/contatti`
- Configurazione Typeform: `TYPEFORM_BASE_URL=https://montagnaservizi.typeform.com`, `TYPEFORM_FORM_ID=202605-mdi`
- Foto team e governance aggiornate con nuove immagini reali (PNG → WebP 400×400, q85)
- Statuto PDF scaricabile da `/chi-siamo` (aggiunto `public/documents/statuto-montagna-servizi.pdf`, link aggiornato)
- Bio e ruolo Enrico Sala nel `GovernanceMemberSeeder` compilati da CV reale; `mandate_info` allineato a "Triennio 2024–2027" per tutti i membri

---

## [0.5.2] — 2026-05-21

### Changed
- `deploy-uat.sh`: sostituito `migrate --force` con `migrate:fresh --force` + `db:seed --force` — il DB UAT viene azzerato e riseminato ad ogni deploy con dati demo (40 news + servizi + team + governance + utente admin)

---

## [0.5.1] — 2026-05-21

### Fixed
- Header sticky interrotto dal div wrapper Alpine.js → aggiunto `style="display:contents"`
- `sitemap.xml` restituiva ParseError: dichiarazione `<?xml` spostata da Blade a `SitemapController`
- Immagini rotte nella home e nel dettaglio news in locale → aggiunto mount volume `storage/` in nginx docker-local
- HTTP 500 su UAT: PHP-FPM (`www-data`, uid 82) non poteva scrivere su `storage/` (proprietà uid 1000) → aggiunto `chown -R www-data:www-data` in `deploy-uat.sh` e `deploy-prod.sh`
- Smoke test CI falliva con HTTP 401 (basic auth UAT attivo) → condizione aggiornata ad accettare 200 e 401

---

## [0.5.0] — 2026-05-20

### Added
- Workflow CI GitHub Actions (`ci.yml`): lint PHP 8.4 + validazione `composer.json`
- Workflow CD GitHub Actions (`deploy-uat.yml`): deploy automatico su push a `develop` via SSH + smoke test HTTP
- Gitflow: branch `main` (protetto, prod), `develop` (auto-deploy UAT), `feature/*`, `fix/*`, `hotfix/*`
- SSH deploy key (ed25519) per GitHub Actions → VPS utente `deploy`
- `FORCE_JAVASCRIPT_ACTIONS_TO_NODE24: true` per silenziare deprecation Node 20 in Actions
- Piano esecutivo Fase 5 (`progettazione/fase5/piano.md` + PDF)
- Versione v5 del piano generale progetto (`progettazione/2026_MS_sitoweb_progettazione_v5.md` + PDF)

---

## [0.4.0] — 2026-05-20

### Added
- SEO: `<meta description>`, Open Graph (`og:title`, `og:image`, `og:type`), `og:locale`, `og:site_name`
- JSON-LD Organization in `<head>` (layout globale)
- JSON-LD NewsArticle nel dettaglio news (per articoli)
- `sitemap.xml` dinamico via `SitemapController` (news pubblicate + servizi + pagine statiche)
- Seeder `NewsDemoSeeder`: 40 news placeholder in italiano con immagini da picsum.photos (deterministiche)
- `deploy-prod.sh`: script deploy produzione con `robots.txt` per indicizzazione
- Infrastruttura UAT: Traefik v3, Let's Encrypt TLS, basic auth nginx su `uat.montagnaservizi.com`
- Docker stack produzione (`docker-prod/`)
- `deploy-uat.sh`: script deploy UAT

### Changed
- Header: accessibilità (`aria-current="page"`, `aria-expanded`, `aria-label` dinamico su hamburger)
- Menu hamburger mobile: Alpine.js drawer con `x-show="open"`, `x-data` con `display:contents`
- `@stack('og_extra')` e `@stack('structured_data')` nel layout per override per-pagina

---

## [0.3.0] — 2026-05-19

### Added
- Admin panel: 6 sezioni CRUD (news, categorie news, servizi, team, governance, impostazioni)
- Autenticazione admin con Laravel Breeze (semplificata)
- Pagine dinamiche: archivio news con filtro categoria/tag e paginazione, dettaglio news
- Template dettaglio servizio con sidebar CTA Typeform
- Integrazioni: Google Tag Manager (consent-gated), form newsletter Brevo (Alpine.js AJAX), protezione CSRF
- Pagine statiche: `/servizi/` landing, 5 pagine categoria servizi, `/chi-siamo/`, legali (privacy, cookie, note legali)

---

## [0.2.0] — 2026-05-18

### Added
- Design system CSS: variabili, tipografia, griglia `l-container`, utilità responsive
- Layout Blade (`layouts/app.blade.php`) con `@yield` e `@stack`
- Componenti Blade: `<x-header>`, `<x-footer>`, `<x-news-card>`, `<x-service-card>`
- Home page con hero, griglia macro-servizi, sezione ultime news, CTA newsletter
- Alpine.js 3.14.1 per interattività lato client (menu mobile, newsletter form)

---

## [0.1.0] — 2026-05-17

### Added
- Setup Laravel 13.11 (PHP 8.4) in `src/`
- Docker Compose locale (`docker-local/`): nginx alpine, PHP-FPM 8.4, MariaDB 11
- Modelli Eloquent: `News`, `Service`, `TeamMember`, `GovernanceMember`, `NewsCategory`
- Migration e factories per tutti i modelli
- Seeders: `AdminUserSeeder`, `NewsCategorySeeder`, `NewsSeeder`, `ServiceSeeder`, `TeamMemberSeeder`, `GovernanceMemberSeeder`
- DB seed locale (`docker-local/db-seed/ms_wordpress.sql`)
- Infrastruttura git: `.gitignore`, `composer.json`, `artisan`

---

[Unreleased]: https://github.com/piccioli/laravel-montagnaservizi/compare/v0.6.1...HEAD
[0.6.1]: https://github.com/piccioli/laravel-montagnaservizi/compare/v0.6.0...v0.6.1
[0.6.0]: https://github.com/piccioli/laravel-montagnaservizi/compare/v0.5.3...v0.6.0
[0.5.3]: https://github.com/piccioli/laravel-montagnaservizi/compare/v0.5.2...v0.5.3
[0.5.2]: https://github.com/piccioli/laravel-montagnaservizi/compare/v0.5.1...v0.5.2
[0.5.1]: https://github.com/piccioli/laravel-montagnaservizi/compare/v0.5.0...v0.5.1
[0.5.0]: https://github.com/piccioli/laravel-montagnaservizi/compare/v0.4.0...v0.5.0
[0.4.0]: https://github.com/piccioli/laravel-montagnaservizi/compare/v0.3.0...v0.4.0
[0.3.0]: https://github.com/piccioli/laravel-montagnaservizi/compare/v0.2.0...v0.3.0
[0.2.0]: https://github.com/piccioli/laravel-montagnaservizi/compare/v0.1.0...v0.2.0
[0.1.0]: https://github.com/piccioli/laravel-montagnaservizi/releases/tag/v0.1.0
