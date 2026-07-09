# SOFWAH-WEB

Public brand landing / premium digital brand experience for **Sofwah Arabic Grill**
(Sofwah Arabiata (M) Sdn. Bhd.). A marketing conversion asset — cinematic, dark, premium,
family-first — built on the Laravel stack and deployed on Laravel Forge.

> Bina sebagai *premium digital brand experience* — bukan sekadar website restoran.

## Stack
Laravel 11 · PHP 8.3 · MySQL 8 · Redis · Blade (server-rendered) + **Livewire 3** islands +
**Alpine** (via Livewire) + **Tailwind 3.4** + **Vite** · **GSAP/ScrollTrigger + Lenis**
(code-split, reduced-motion aware) · self-hosted **Poppins + Tajawal** · AVIF/WebP via `sharp`.

## Brand DNA (locked)
Colours `#0B0B0D / #151517 / #730D04 / #FF9A06 / #FFDA7C` + ink ramp, ratio **70/15/10/5**,
Poppins + Tajawal only, glassmorphism, real photography. See `docs/01-design-system.md`.

## Structure
```
app/Http/Controllers/LandingController.php   # loads content + branches + JSON-LD
app/Livewire/{ReservationForm,ReviewWall}.php
app/Models/Lead.php · app/Support/StructuredData.php
resources/content/{bm,en,branches,reviews}.php   # source of truth (BM primary + EN)
resources/views/{layouts,sections,components,livewire}/…
resources/css/app.css · resources/js/app.js · resources/fonts/*
public/images/**                              # optimized JPEG + WebP + AVIF (committed)
routes/web.php                                # /, /robots.txt, /sitemap.xml
scripts/optimize-images.mjs                   # regenerate AVIF/WebP
tailwind.config.js · vite.config.js · config/sofwah.php · deploy.sh · .env.example
docs/00…06                                    # phase docs (blueprint → deploy runbook)
```

## Local dev
Needs PHP 8.3 + Composer + Node. First-time skeleton bootstrap: see `docs/06-forge-runbook.md §0`.
```bash
composer install
cp .env.example .env && php artisan key:generate
php artisan migrate
npm install && npm run dev      # or: npm run build
php artisan serve               # http://127.0.0.1:8000  (?lang=en for English)
```
Regenerate image variants after adding photos: `node scripts/optimize-images.mjs`.

## Deploy
Laravel Forge — see **`docs/06-forge-runbook.md`** (deploy script in `deploy.sh`).
Quick Deploy on push to `main`. **Production go-live is CEO-only.**

## Phases
0 Blueprint · 1 Design System · 2 Core Build · 3 Social & Branch · 4 Conversion ·
5 SEO/Perf/A11y · 6 Forge deploy. Each is documented under `docs/`.
