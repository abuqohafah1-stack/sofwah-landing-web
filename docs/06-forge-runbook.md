# SOFWAH-WEB — PHASE 6 · LARAVEL FORGE DEPLOYMENT RUNBOOK
**Status:** deploy-ready. **Production go-live is CEO-only** — nothing here has been executed.
**Date:** 2026-07-09

> This runbook lets Abu (or a dev) deploy SOFWAH-WEB to Laravel Forge. Claude has **not**
> touched DNS, Forge, or production — every step below is performed by you.

---

## 0. Repo is deploy-ready (skeleton committed)
This repo is a **complete Laravel 13 app** — the full framework skeleton (`artisan`,
`bootstrap/`, `config/`, `public/index.php`, `storage/`, `tests/`) **and a committed
`composer.lock`** are in the repo. Only `vendor/` and `node_modules/` are installed on the
server. Because `composer install` uses the committed lock, the security-advisory block that
happened when resolving Laravel 11 fresh with no lock **no longer occurs**.

**Stack:** Laravel 13 · PHP 8.3 · **Livewire 4** · Tailwind 3.4 · Vite. Verified locally:
`php artisan serve` renders the full page (BM + EN), Livewire reservation form + review filter
wired, 8-node JSON-LD valid, `/sitemap.xml` + `/robots.txt` respond. **No bootstrap step
needed — Forge can clone and deploy directly.**

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
