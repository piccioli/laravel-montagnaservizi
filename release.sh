#!/usr/bin/env bash
# ============================================================
# release.sh — Bump versione, aggiorna CHANGELOG, crea git tag
#
# Uso:
#   ./release.sh patch   # 0.5.1 → 0.5.2
#   ./release.sh minor   # 0.5.1 → 0.6.0
#   ./release.sh major   # 0.5.1 → 1.0.0
#   ./release.sh 1.2.3   # versione esatta
# ============================================================

set -euo pipefail

BUMP="${1:-}"
VERSION_FILE="$(dirname "$0")/src/VERSION"
CHANGELOG_FILE="$(dirname "$0")/CHANGELOG.md"
REPO_URL="https://github.com/piccioli/laravel-montagnaservizi"

RED='\033[0;31m'; GREEN='\033[0;32m'; YELLOW='\033[1;33m'; BOLD='\033[1m'; NC='\033[0m'
die()  { echo -e "${RED}ERROR:${NC} $1" >&2; exit 1; }
step() { echo -e "${GREEN}==>${NC} $1"; }

[ -n "$BUMP" ] || die "Specifica il tipo di bump: patch | minor | major | X.Y.Z"

# ── Leggi versione corrente ──────────────────────────────────
CURRENT=$(cat "$VERSION_FILE" | tr -d '[:space:]')
IFS='.' read -r MAJOR MINOR PATCH <<< "$CURRENT"

# ── Calcola nuova versione ───────────────────────────────────
case "$BUMP" in
  patch) PATCH=$((PATCH + 1)) ;;
  minor) MINOR=$((MINOR + 1)); PATCH=0 ;;
  major) MAJOR=$((MAJOR + 1)); MINOR=0; PATCH=0 ;;
  [0-9]*.[0-9]*.[0-9]*) MAJOR="${BUMP%%.*}"; REST="${BUMP#*.}"; MINOR="${REST%%.*}"; PATCH="${REST##*.}" ;;
  *) die "Valore non valido: '$BUMP'. Usa patch|minor|major oppure X.Y.Z" ;;
esac

NEW_VERSION="${MAJOR}.${MINOR}.${PATCH}"
TODAY=$(date +%Y-%m-%d)

step "Bump: ${BOLD}${CURRENT}${NC} → ${BOLD}${NEW_VERSION}${NC}"

# ── Verifica working tree pulito ─────────────────────────────
if ! git diff --quiet || ! git diff --cached --quiet; then
  die "Working tree non pulito. Fai commit o stash prima di fare release."
fi

# ── Aggiorna VERSION ────────────────────────────────────────
echo "$NEW_VERSION" > "$VERSION_FILE"
step "VERSION aggiornato → $NEW_VERSION"

# ── Aggiorna CHANGELOG ──────────────────────────────────────
# Sostituisce il placeholder [Unreleased] con la nuova versione + data
# e aggiunge un nuovo blocco [Unreleased] vuoto in cima
PREV_TAG="v${CURRENT}"
NEW_TAG="v${NEW_VERSION}"

python3 - <<PYEOF
import re, pathlib

path = pathlib.Path("$CHANGELOG_FILE")
content = path.read_text()

# Sostituisce "## [Unreleased]" con versione + data
content = content.replace(
    "## [Unreleased]\n",
    f"## [Unreleased]\n\n---\n\n## [{NEW_VERSION}] — {TODAY}\n"
)

# Aggiorna link in fondo
old_unreleased = f"[Unreleased]: {REPO_URL}/compare/{PREV_TAG}...HEAD"
new_unreleased = f"[Unreleased]: {REPO_URL}/compare/{NEW_TAG}...HEAD"
new_link = f"[{NEW_VERSION}]: {REPO_URL}/compare/{PREV_TAG}...{NEW_TAG}"

if old_unreleased in content:
    content = content.replace(
        old_unreleased,
        f"{new_unreleased}\n{new_link}"
    )
else:
    # Primo utilizzo: aggiungi i link
    content += f"\n[Unreleased]: {REPO_URL}/compare/{NEW_TAG}...HEAD\n"
    content += f"[{NEW_VERSION}]: {REPO_URL}/compare/{PREV_TAG}...{NEW_TAG}\n"

path.write_text(content)
print("CHANGELOG aggiornato")
PYEOF

step "CHANGELOG aggiornato"

# ── Commit + tag ────────────────────────────────────────────
git add "$VERSION_FILE" "$CHANGELOG_FILE"
git commit -m "chore(release): v${NEW_VERSION}"
git tag -a "$NEW_TAG" -m "Release v${NEW_VERSION}"

echo ""
echo -e "${GREEN}✓ Release ${BOLD}${NEW_TAG}${NC}${GREEN} creata.${NC}"
echo "  Push con: git push origin HEAD && git push origin ${NEW_TAG}"
