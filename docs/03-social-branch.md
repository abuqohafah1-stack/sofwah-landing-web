# SOFWAH-WEB — PHASE 3 SOCIAL & BRANCH
### Wall of Love · Brand Story · Branch bento · Family Dining · FAQ
**Status:** ⛔ Awaiting CEO (Abu) approval to advance to Phase 4
**Date:** 2026-07-09 · Data source: `linktr.ee/nasiarabsofwah` (via tr.ee/sofwah)

---

## Delivered

**Sections (Blade)**
- `sections/wall-of-love.blade.php` — REVIEW/Trust. Real 4.9★ aggregate + real per-branch
  ratings (each chip links to that branch's Google page) + accolade + sample cards (labelled).
- `sections/brand-story.blade.php` — `#cerita`. Caregiver+Ruler voice, real counter photo.
- `sections/branches.blade.php` — `#cawangan`. Bento of 6 branches; **real WhatsApp order +
  Google Maps navigate + Google rating** per card. Order CTAs across the site now point here.
- `sections/family.blade.php` — emotional band, "Tempat memori tercipta".
- `sections/faq.blade.php` — Alpine accordion (`@alpinejs/collapse`), feeds FAQPage schema (Phase 5).
- `components/review-card.blade.php`

**Data & content**
- `resources/content/branches.php` — factual, language-neutral (city, area, WhatsApp, Maps,
  rating, geo). **Order channel confirmed: WhatsApp per branch** (`wasap.my`).
- `bm.php` / `en.php` extended: `reviews`, `story`, `branches` (highlights), `family`, `faq`.
- `LandingController` now passes `$branches`; hero rating updated 4.8 → **4.9** (real).

**Build:** `npm run build` verified — CSS 21 kB, JS 183 kB (+ Alpine collapse). 10 modules.

**Visual proof (Artifact):** https://claude.ai/code/artifact/ea45f6b4-6bd2-4526-aa51-8dafb0c3c66d
(WhatsApp + Maps buttons are the real, clickable branch links.)

---

## Real branch data (from the link hub)

| Branch | WhatsApp (order) | Google | Rating |
|---|---|---|---|
| Gurun | wasap.my/60142288956 | maps.app.goo.gl/TuAdjPonGG1eMgsv5 | 4.9 |
| Kuala Nerang | wasap.my/601154040068 | goo.gl/maps/FKo6uQ6EVz2EwHTe6 | 4.9 |
| Sungai Petani | wasap.my/601168714468 | maps.app.goo.gl/cmPZ8A5zMPcgmAgt8 | 4.8 |
| Alor Setar · Jalan Pegawai | wasap.my/601128926003 | maps.app.goo.gl/5RwHypf2sYq3iueL6 | 4.9 |
| Jitra | wasap.my/601160999123 | maps.app.goo.gl/eRSGw1vmdnWNmBLp7 | 4.9 |
| Alor Setar · Aman Central | wasap.my/601161144460 | maps.app.goo.gl/hCVjWS5SqVmWm8Bd8 | 4.9 |

Also on the hub: **Menu catalog** (heyzine.com/flip-book/b1dccc4f35.html), FB/TikTok
@sofwah_arabicgrill. Geo resolved for Kuala Nerang / Jitra / Aman Central; other 3 + full
addresses & hours → Phase 5 (for LocalBusiness JSON-LD).

## Honest gaps
- **Wall of Love review text** is illustrative (labelled). Real Google review text streams in
  via the Phase 4 Livewire ReviewWall + sync (or Abu can paste real reviews).
- **Order** = anchor to branch bento → per-branch WhatsApp (working). Phase 4 adds the
  Livewire sticky order sheet / branch picker + reservation lead capture.

## Next — Phase 4 (Conversion & Interactivity)
Livewire islands (ReviewWall filter, BranchSelector nearest-branch, ReservationForm lead
capture, StickyOrderSheet), final conversion band, GA4 events.
**Needs from CEO:** GA4 measurement ID; reservation/enquiry destination (email + WhatsApp);
whether to wire live Google reviews (needs Places API key) or paste real reviews.
