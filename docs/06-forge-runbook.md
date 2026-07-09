# SOFWAH-WEB — PHASE 6 · LARAVEL FORGE DEPLOYMENT RUNBOOK
**Status:** deploy-ready. **Production go-live is CEO-only** — nothing here has been executed.
**Date:** 2026-07-09

> This runbook lets Abu (or a dev) deploy SOFWAH-WEB to Laravel Forge. Claude has **not**
> touched DNS, Forge, or production — every step below is performed by you.

---

## 0. What's in this repo vs generated on deploy
This repo is the **application layer** (routes, controllers, Blade, Livewire, content, config,
Tailwind, JS, fonts, optimized images incl. committed AVIF/WebP). The standard Laravel 11
**framework skeleton** (`artisan`, `bootstrap/`, `public/index.php`, base `config/*`, `storage/`)
is generated once via Composer and this app layer overlays it. `vendor/` and `node_modules/`
are never committed (installed on the server).

### One-time bootstrap (on a machine with PHP 8.3 + Composer)
```bash
# 1) Generate a fresh Laravel 11 skeleton in a temp dir
composer create-project laravel/laravel _skeleton "^11.0"

# 2) Copy the skeleton files this repo does NOT already contain
#    (artisan, bootstrap/, public/index.php, storage/, base config/*, tests/, etc.)
#    WITHOUT overwriting the app files already here (routes, app/, resources/,
#    config/sofwah.php, tailwind.config.js, package.json, composer.json, etc.)
# 3) Require Livewire (already in composer.json): composer require livewire/livewire:^3.5
# 4) composer install && npm install && npm run build
# 5) cp .env.example .env && php artisan key:generate
# 6) commit the skeleton so Forge can clone + composer install
```
> Alternatively: start from a fresh `laravel new sofwah-web`, drop this repo's app files on
> top, then `composer require livewire/livewire`. Either way the result is committed to
> the private GitHub repo `sofwah-web`.

---

## 1. Server (Forge)
- Provision (or reuse) a Forge server with **PHP 8.3**, **MySQL 8**, **Redis**, **Nginx**.
- Ensure **Node LTS** is available for the build step (Forge servers have it).

## 2. Create the site
- Forge → Server → **New Site** → domain `sofwaharabicgrill.com` (web dir `/public`).
- **Git Repository**: `sofwah-web`, branch `main`. Install.

## 3. Environment
- Forge → Site → **Environment**: paste `.env.example`, then fill:
  `APP_URL` (real domain), `APP_KEY` (`php artisan key:generate` or Forge does it),
  DB creds, Redis, `GA4_ID` (optional), mail. Set `APP_ENV=production`, `APP_DEBUG=false`.
- Create the MySQL database (`sofwah_web`) + user in Forge → Database.

## 4. Deploy script
- Forge → Site → **Deploy Script**: paste `deploy.sh` from the repo root.
- Enable **Quick Deploy** (auto-deploy on push to `main`).
- Run the first **Deploy Now**. (Runs migrate → creates `leads` table.)

## 5. SSL
- Forge → Site → **SSL** → **Let's Encrypt** → obtain certificate. Force HTTPS.

## 6. Scheduler (for the future review-sync cron)
- Forge → Server → **Scheduler**: add `php /home/forge/<site>/artisan schedule:run` every minute.
  (No scheduled jobs ship yet; ready for the Google review sync when enabled.)

## 7. Queue worker (Redis)
- Forge → Server → **Daemons** (or Site → Queue): start a worker
  `php artisan queue:work redis --sleep=3 --tries=3 --max-time=3600`.
  (Lead capture is synchronous today; the worker is ready for email/WhatsApp-notify jobs.)

## 8. Cloudflare (edge cache + Brotli)
- Point Cloudflare (proxied, orange cloud) → Forge server IP.
- Enable Brotli, HTTP/2, and cache static assets (`/build/*`, `/images/*`, `/fonts/*`).
- ⚠️ **DNS changes require explicit CEO action** — not done here.

## 9. Post-deploy verification
- `https://<domain>/` renders; `?lang=en` toggles EN.
- `/sitemap.xml` + `/robots.txt` respond.
- Rich Results Test on the homepage → Restaurant + FAQPage valid.
- Submit the reservation form → lead row in `leads` + WhatsApp opens.
- **Lighthouse ≥ 95** (Perf/SEO/BP/A11y) + **axe** audit on staging. Fix any findings.

---

## Environment keys (never commit real values)
`APP_*`, `DB_*`, `REDIS_*`, `MAIL_*`, `GA4_ID`, `GOOGLE_MAPS_KEY`, `WHATSAPP_ORDER_DEFAULT`.

## Data to finalize before go-live
- Full **street address + opening hours** per branch (completes LocalBusiness schema).
- **GA4 Measurement ID** (activates analytics).
- Real **Google review** text/counts (enables AggregateRating + live ReviewWall).
- Remaining branch **geo** (Gurun, Sungai Petani, Alor Setar Jln Pegawai).

## ⚠️ Guardrails
DNS, production go-live, and any payment integration require **explicit CEO instruction**.
This runbook is documentation only — no infra action has been taken.
