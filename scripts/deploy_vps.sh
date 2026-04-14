#!/usr/bin/env bash

set -euo pipefail

DEPLOY_PATH="${DEPLOY_PATH:-/var/www/laravel-ci}"
DEPLOY_REF="${DEPLOY_REF:-main}"
PHP_BIN="${PHP_BIN:-php}"
COMPOSER_BIN="${COMPOSER_BIN:-composer}"
NPM_BIN="${NPM_BIN:-npm}"

echo "[deploy] path=${DEPLOY_PATH} ref=${DEPLOY_REF}"

if [ ! -d "${DEPLOY_PATH}" ]; then
    echo "[deploy] DEPLOY_PATH not found: ${DEPLOY_PATH}" >&2
    exit 1
fi

cd "${DEPLOY_PATH}"

if [ ! -d .git ]; then
    echo "[deploy] ${DEPLOY_PATH} is not a git repository." >&2
    exit 1
fi

if [ ! -f .env ]; then
    echo "[deploy] .env missing in ${DEPLOY_PATH}. Copy from .env.example first." >&2
    exit 1
fi

git fetch --prune origin

# Deploy either an explicit commit SHA or a branch name.
if git rev-parse --verify --quiet "${DEPLOY_REF}^{commit}" >/dev/null; then
    git checkout --detach "${DEPLOY_REF}"
else
    git checkout "${DEPLOY_REF}"
    git pull --ff-only origin "${DEPLOY_REF}"
fi

${COMPOSER_BIN} install --no-interaction --prefer-dist --optimize-autoloader --no-dev
${NPM_BIN} ci
${NPM_BIN} run production

${PHP_BIN} artisan migrate --force
${PHP_BIN} artisan optimize:clear
${PHP_BIN} artisan config:cache
${PHP_BIN} artisan route:cache
${PHP_BIN} artisan view:cache

echo "[deploy] completed successfully"