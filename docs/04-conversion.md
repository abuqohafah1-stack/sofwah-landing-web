# SOFWAH-WEB — PHASE 4 CONVERSION & INTERACTIVITY
### Livewire islands · order sheet · reservation lead capture · GA4
**Status:** ⛔ Awaiting CEO (Abu) approval to advance to Phase 5
**Date:** 2026-07-09

---

## Delivered

**Livewire islands**
- `app/Livewire/ReservationForm.php` + `resources/views/livewire/reservation-form.blade.php`
  — validates, **saves lead to MySQL** (`leads` table), then redirects to the chosen
  branch's **WhatsApp with a pre-filled message** (name, date, pax, note, phone).
- `app/Livewire/ReviewWall.php` + `resources/views/livewire/review-wall.blade.php`
  — filters reviews by **branch + rating** (source: `resources/content/reviews.php`,
  swappable to the cached-reviews DB table when Google sync is enabled).

**Data**
- `app/Models/Lead.php` + migration `..._create_leads_table.php`
  (name, phone, branch, reserve_date, pax, message, source).

**Conversion UI**
- `components/order-sheet.blade.php` — persistent mobile CTA + slide-up **branch picker
  order sheet**; “use my location” sorts branches by distance (Alpine, client-side).
  *(Stateless UI → Alpine, not Livewire — justified; no server round-trip needed.)*
- `sections/reserve.blade.php` (`#tempah`) + `sections/final-cta.blade.php` (Action close).

**Analytics**
- `config/sofwah.php` (`GA4_ID` via .env) + GA4 snippet in layout (**inert until ID set**).
- GA4 events in `app.js`: `view_hero`, `click_order` (WhatsApp links), `click_branch` (Maps links).

**Architecture fix:** removed the second bundled Alpine — Livewire 3 provides & starts Alpine.
`app.js` now owns motion only (GSAP/Lenis). FAQ uses native `<details>` (no plugin).
**Result:** JS bundle **136 kB** (was 183 kB).

**Verify:** all PHP `php -l` clean; `npm run build` clean (CSS 23 kB, JS 136 kB).
**Interactive proof:** https://claude.ai/code/artifact/54515626-f563-4886-a415-9f986ed9e2eb
(filter reviews · open order sheet · submit form → opens real WhatsApp pre-filled).

---

## Honest notes
- Livewire runs on the server — not exercised locally (Composer/Laravel skeleton needed;
  Forge runs it). PHP files lint clean; logic verified by inspection + the interactive proof.
- Order channel = **WhatsApp per branch** (confirmed). Lead is stored **and** WhatsApp opens.
- Review text still sample; real Google reviews via sync (needs Places API key) or paste.

## Next — Phase 5 (SEO / Perf / A11y hardening)
Per-branch `Restaurant`/`LocalBusiness` + `FAQPage` + `AggregateRating` JSON-LD (real data),
sitemap/robots, AVIF/WebP image pipeline (incl. exporting the 13–16 MB pro dish photos via
Drive API), code-split GSAP, Lighthouse ≥95, WCAG 2.1 AA audit.
**Needs from CEO:** GA4 Measurement ID; final domain (canonical/OG/sitemap URLs); full branch
addresses + operating hours + remaining geo (Gurun, Sungai Petani, Alor Setar Jln Pegawai).
