#!/usr/bin/env bash

set -euo pipefail

DEPLOY_PATH="${DEPLOY_PATH:-/var/www/laravel-ci}"
DEPLOY_REF="${DEPLOY_REF:-main}"
PHP_BIN="${PHP_BIN:-php}"
COMPOSER_BIN="${COMPOSER_BIN:-composer}"
NPM_BIN="${NPM_BIN:-npm}"
RUN_MIGRATIONS="${RUN_MIGRATIONS:-false}"

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

APP_KEY_LINE="$(grep -E '^APP_KEY=' .env || true)"
if [ -z "${APP_KEY_LINE}" ] || [ "${APP_KEY_LINE}" = "APP_KEY=" ]; then
    echo "[deploy] APP_KEY is missing in .env. Set APP_KEY before deploying." >&2
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

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chmod -R ug+rwx storage bootstrap/cache || true

if command -v chown >/dev/null 2>&1; then
    # Best effort ownership update for common nginx/apache user.
    chown -R www-data:www-data storage bootstrap/cache || true
fi

if [ "${RUN_MIGRATIONS}" = "true" ]; then
    ${PHP_BIN} artisan migrate --force
else
    echo "[deploy] skipping migrations (RUN_MIGRATIONS=false)"
fi

${PHP_BIN} artisan storage:link || true
${PHP_BIN} artisan optimize:clear
${PHP_BIN} artisan config:cache
${PHP_BIN} artisan route:cache
${PHP_BIN} artisan view:cache

echo "[deploy] completed successfully"