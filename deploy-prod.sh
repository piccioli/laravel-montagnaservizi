#!/usr/bin/env bash
# ============================================================
# deploy-prod.sh — Deploy su ambiente Produzione
#
# Eseguire dal server, nella root del progetto clonato:
#   cd /srv/montagnaservizi && ./deploy-prod.sh
#
# Prerequisiti (solo prima esecuzione):
#   1. docker-traefik avviato (vedi README)
#   2. docker network create web
#   3. Creare .env.prod da .env.prod.example e compilare
# ============================================================

set -euo pipefail

PROJECT_ROOT="$(cd "$(dirname "$0")" && pwd)"
DOCKER_DIR="$PROJECT_ROOT/docker-prod"
ENV_FILE="$PROJECT_ROOT/.env.prod"

GREEN='\033[0;32m'; YELLOW='\033[1;33m'; NC='\033[0m'
step() { echo -e "${GREEN}==>${NC} $1"; }
warn() { echo -e "${YELLOW}[warn]${NC} $1"; }

# ── Verifica prerequisiti ────────────────────────────────────
[ -f "$ENV_FILE" ] || { echo "ERROR: .env.prod non trovato."; exit 1; }

# ── Pull codice ──────────────────────────────────────────────
step "Pulling codice da origin/main..."
git -C "$PROJECT_ROOT" pull origin main

# ── Build immagine app ───────────────────────────────────────
step "Build immagine PHP-FPM..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    build --pull app

# ── Dipendenze PHP (no-dev) ──────────────────────────────────
step "Installing PHP dependencies (--no-dev)..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    run --rm --no-deps app \
    composer install --no-dev --optimize-autoloader --no-interaction --quiet

# ── Migrazioni ───────────────────────────────────────────────
step "Esecuzione migrazioni..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    exec app php artisan migrate --force

# ── Storage symlink ──────────────────────────────────────────
step "Storage link..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    exec app php artisan storage:link --force 2>/dev/null || warn "Storage link già presente"

# ── Cache Laravel ────────────────────────────────────────────
step "Config / route / view cache..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    exec app php artisan config:cache
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    exec app php artisan route:cache
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    exec app php artisan view:cache

# ── robots.txt produzione ────────────────────────────────────
step "Scrittura robots.txt produzione..."
cat > "$PROJECT_ROOT/src/public/robots.txt" <<'ROBOTS'
User-agent: *
Allow: /

Sitemap: https://www.montagnaservizi.com/sitemap.xml
ROBOTS

# ── Restart PHP-FPM ─────────────────────────────────────────
step "Restart app container..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    restart app

echo ""
echo -e "${GREEN}✓ Deploy produzione completato!${NC}"
echo "   URL: https://www.montagnaservizi.com"
