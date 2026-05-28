# Montagna Servizi SCPA — Sito istituzionale

**Versione:** 0.5.3 · **Stato:** sviluppo (pre go-live)

Sito istituzionale di [Montagna Servizi SCPA](https://montagnaservizi.com), la cooperativa del Club Alpino Italiano che supporta Sezioni e Gruppi Regionali nella gestione quotidiana.

---

## Stack tecnico

| Layer | Tecnologia |
|---|---|
| Backend | PHP 8.4 / Laravel 11 |
| Frontend | Blade + Alpine.js + CSS custom |
| Database | MariaDB 11 |
| Web server | Nginx |
| Containerizzazione | Docker Compose |
| CI/CD | GitHub Actions |
| Modulo contatti | Typeform embed |
| Newsletter | Brevo |
| Analytics | Google Tag Manager + GA4 |

---

## Ambienti

| Ambiente | URL | Branch |
|---|---|---|
| Locale | `http://localhost:8080` | qualsiasi |
| UAT | `https://uat.montagnaservizi.com` | `develop` (auto-deploy) |
| Produzione | `https://montagnaservizi.com` | `main` |

---

## Avvio locale

```bash
# 1. Copia le variabili d'ambiente
cp src/.env.example src/.env

# 2. Avvia lo stack Docker
docker compose -f docker-local/docker-compose.yml up -d

# 3. Installa le dipendenze PHP
docker compose -f docker-local/docker-compose.yml exec app composer install

# 4. Migrazione e seed
docker compose -f docker-local/docker-compose.yml exec app php artisan migrate:fresh --seed

# 5. Storage symlink
docker compose -f docker-local/docker-compose.yml exec app php artisan storage:link
```

Il sito sarà disponibile su `http://localhost:8080`.

---

## Gitflow

```
main        → produzione (protetto)
develop     → UAT (auto-deploy su push)
feature/*   → nuove funzionalità
fix/*       → bugfix
hotfix/*    → fix urgenti su produzione
```

---

## Versioning e release

Il progetto usa [Semantic Versioning](https://semver.org/lang/it/) (`MAJOR.MINOR.PATCH`).  
Le versioni `0.x.x` sono quelle pre go-live.

```bash
./release.sh patch   # 0.5.3 → 0.5.4
./release.sh minor   # 0.5.3 → 0.6.0
```

Vedi [CHANGELOG.md](CHANGELOG.md) per la storia delle versioni.

---

## Struttura del progetto

```
.
├── src/                    # Applicazione Laravel
│   ├── app/
│   ├── database/seeders/
│   ├── public/
│   └── resources/views/
├── docker-local/           # Stack Docker per sviluppo locale
├── docker-uat/             # Stack Docker per UAT
├── docker-prod/            # Stack Docker per produzione
├── progettazione/          # Documenti di progetto e asset
├── deploy-uat.sh           # Script di deploy UAT
├── deploy-prod.sh          # Script di deploy produzione
├── release.sh              # Script di bump versione
└── CHANGELOG.md
```

---

*Sviluppato da [Webmapp s.r.l.](https://webmapp.it) per Montagna Servizi SCPA.*
