#!/usr/bin/env bash
# ── SOFWAH-WEB · Laravel Forge deploy script ────────────────────────────────
# Paste this into the Forge site's "Deploy Script" (adjust $FORGE_* if needed).
# Enable Quick Deploy so it runs on every push to `main`.
set -e

cd "$FORGE_SITE_PATH"

git pull origin main

# PHP dependencies (production)
$FORGE_COMPOSER install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Frontend build (Node is build-time only; no Node runtime in production)
npm ci
npm run build

# Database
$FORGE_PHP artisan migrate --force

# Caches
$FORGE_PHP artisan config:cache
$FORGE_PHP artisan route:cache
$FORGE_PHP artisan view:cache

# Restart the Redis queue worker so it picks up new code
$FORGE_PHP artisan queue:restart
