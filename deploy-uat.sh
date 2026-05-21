#!/usr/bin/env bash
# ============================================================
# deploy-uat.sh — Deploy su ambiente UAT
#
# Eseguire dal server, nella root del progetto clonato:
#   cd /srv/montagnaservizi && ./deploy-uat.sh
#
# Prerequisiti (solo prima esecuzione — vedi sotto):
#   Segui la sequenza in PRIMA INSTALLAZIONE UAT più avanti.
# ============================================================

set -euo pipefail

PROJECT_ROOT="$(cd "$(dirname "$0")" && pwd)"
DOCKER_DIR="$PROJECT_ROOT/docker-uat"
ENV_FILE="$PROJECT_ROOT/.env.uat"

GREEN='\033[0;32m'; YELLOW='\033[1;33m'; NC='\033[0m'
step() { echo -e "${GREEN}==>${NC} $1"; }
warn() { echo -e "${YELLOW}[warn]${NC} $1"; }

# ── Verifica prerequisiti ────────────────────────────────────
[ -f "$ENV_FILE" ] || { echo "ERROR: .env.uat non trovato."; exit 1; }
[ -f "$DOCKER_DIR/nginx/.htpasswd" ] || {
    echo "ERROR: docker-uat/nginx/.htpasswd non trovato."
    echo "       Generalo con: htpasswd -Bc docker-uat/nginx/.htpasswd admin"
    exit 1; }

# ── Pull codice ──────────────────────────────────────────────
step "Pulling codice da origin/develop..."
git -C "$PROJECT_ROOT" pull origin develop

# ── Build immagine app (solo se Dockerfile cambiato) ─────────
step "Build immagine PHP-FPM..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    build --pull app

# ── Avvio stack (idempotente — necessario dopo reboot) ───────
step "Stack up..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    up -d --remove-orphans

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

# ── Restart PHP-FPM ─────────────────────────────────────────
step "Restart app container..."
docker compose -f "$DOCKER_DIR/docker-compose.yml" --env-file "$ENV_FILE" \
    restart app

echo ""
echo -e "${GREEN}✓ Deploy UAT completato!${NC}"
echo "   URL: https://uat.montagnaservizi.com"
