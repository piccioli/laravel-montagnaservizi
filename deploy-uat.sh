#!/usr/bin/env bash
# ============================================================
# deploy-uat.sh — Deploy su ambiente UAT
#
# Eseguire dal server UAT nella root del progetto:
#   cd /srv/montagnaservizi && ./deploy-uat.sh
#
# Prerequisiti (prima esecuzione):
#   1. Clonare il repo: git clone <url> /srv/montagnaservizi
#   2. Copiare .env.uat.example in .env.uat e compilare i valori
#   3. Generare htpasswd:
#        htpasswd -Bc docker-uat/nginx/.htpasswd admin
#   4. Creare la rete Docker condivisa:
#        docker network create web
#   5. Prima run:
#        cd docker-uat && docker compose --env-file ../.env.uat up -d --build
#        docker compose --env-file ../.env.uat exec app php artisan key:generate --force
#        docker compose --env-file ../.env.uat exec app php artisan migrate --seed --force
#        docker compose --env-file ../.env.uat exec app php artisan storage:link --force
# ============================================================

set -euo pipefail

PROJECT_ROOT="$(cd "$(dirname "$0")" && pwd)"
DOCKER_DIR="$PROJECT_ROOT/docker-uat"
ENV_FILE="$PROJECT_ROOT/.env.uat"

# Colori
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

step() { echo -e "${GREEN}==>${NC} $1"; }
warn() { echo -e "${YELLOW}[warn]${NC} $1"; }

# ── Verifica prerequisiti ─────────────────────────────────────
if [ ! -f "$ENV_FILE" ]; then
    echo "ERROR: .env.uat non trovato. Copia .env.uat.example in .env.uat e compila i valori."
    exit 1
fi

if [ ! -f "$DOCKER_DIR/nginx/.htpasswd" ]; then
    echo "ERROR: docker-uat/nginx/.htpasswd non trovato."
    echo "Generalo con: htpasswd -Bc docker-uat/nginx/.htpasswd admin"
    exit 1
fi

# ── Pull codice ───────────────────────────────────────────────
step "Pulling codice da origin/main..."
git -C "$PROJECT_ROOT" pull origin main

# ── Rebuild immagine app se Dockerfile cambiato ───────────────
step "Build immagine PHP-FPM (solo se necessario)..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    build --pull app

# ── Dipendenze PHP (no-dev) ───────────────────────────────────
step "Installing PHP dependencies (--no-dev)..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    run --rm --no-deps app \
    composer install --no-dev --optimize-autoloader --no-interaction --quiet

# ── Migrazioni ────────────────────────────────────────────────
step "Esecuzione migrazioni..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    exec app php artisan migrate --force

# ── Storage symlink ───────────────────────────────────────────
step "Storage link..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    exec app php artisan storage:link --force 2>/dev/null || warn "Storage link già presente"

# ── Cache Laravel ─────────────────────────────────────────────
step "Ottimizzazione config/route/view cache..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    exec app php artisan config:cache
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    exec app php artisan route:cache
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    exec app php artisan view:cache

# ── Restart app (PHP-FPM reload) ─────────────────────────────
step "Restart PHP-FPM..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    restart app

echo ""
echo -e "${GREEN}✓ Deploy UAT completato!${NC}"
echo "   URL: https://uat.montagnaservizi.com"
echo "   Log: docker compose -f docker-uat/docker-compose.yml logs -f app"
