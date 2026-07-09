# SOFWAH-WEB — PHASE 0 BLUEPRINT
### Public Brand Landing · Premium Digital Brand Experience
**Status:** ⛔ Awaiting CEO (Abu) approval to advance to Phase 1
**Prepared by:** Sofwah product+brand team (Claude Code)
**Date:** 2026-07-09
**Governing docs:** Master prompt v2 (SOFWAH-WEB) + `sofwah-brand-dna-pesona-skill`

> This document is the Phase 0 deliverable: Information Architecture, UX + emotional
> journey map, hi-fi wireframe structure per section, tech-stack confirmation, and the
> BM/EN content skeleton. **No application code is written in Phase 0.** Scaffolding
> begins only after this gate is approved.

---

## A. TECH STACK CONFIRMATION (Forge-native)

**Locked to PRIMARY stack (Section 4.1) — default, no deviation requested.**

| Layer | Choice | Why |
|---|---|---|
| Runtime | Laravel 11 · PHP 8.3 (FPM) | Same ecosystem as MANARA; Forge one-click deploy |
| Data | MySQL 8 · Redis | Leads, cached reviews, branch data / cache + queue |
| Rendering | Blade (server-rendered) | Perfect crawlable HTML → best SEO + FCP |
| Interactive islands | Livewire 3 | Reservation form, review wall filter, branch selector, sticky order sheet |
| Micro-interaction | Alpine.js 3 | Menus, toggles, accordions, **EN/BM switch** |
| Styling | Tailwind 3.4 + Sofwah tokens | Brand DNA encoded as tokens (Section 10) |
| Bundler | Vite | Hashed assets, build-time only |
| Motion | GSAP + ScrollTrigger + Lenis | Cinematic scroll, `prefers-reduced-motion` fallbacks |
| Media | AVIF/WebP `<picture>` + `spatie/laravel-image-optimizer` | LCP < 2.0s |
| SEO | `spatie/laravel-sitemap`, JSON-LD | Restaurant/LocalBusiness per branch + FAQPage |
| Deploy | Laravel Forge → Nginx → PHP-FPM + Cloudflare | Quick Deploy on `main`, zero Node runtime in prod |

**Forge-installability: CONFIRMED.** Standard Laravel deploy script (Section 16). No Node
daemon, no PM2, no reverse proxy to babysit. Build-time Node only (Vite).

**Alternative stacks (B1 Inertia/React, B2 Next static-export, B3 Next SSR):** available
on explicit CEO instruction only. Not built. **We ship ONE stack.**

**Brand DNA font deviation status:** RESOLVED. v1's serif suggestions (Playfair/Cormorant/
DM Serif) are overridden. **Locked to Poppins (display + body) + Tajawal (Arabic/accent).**
A serif hero face would be a Brand-DNA deviation requiring explicit CEO sign-off — not on
the table unless you ask.

---

## B. INFORMATION ARCHITECTURE (final)

Single long-form landing page, section-anchored (`/#hero`, `/#menu`, `/#cawangan` …),
mobile-first, with a **persistent mobile CTA bar** across all sections.

| # | Section | 7R / PESONA state | Emotion target | Primary persona | Fear neutralized | On-section CTA |
|---|---|---|---|---|---|---|
| 1 | **Hero Experience** | REALIZE / Curiosity→Craving | "I feel something" | Family Provider | — (hook + trust) | Order Sekarang · Cari Cawangan |
| 2 | **Signature Dining** | RASA / Desire | "I'm getting hungry" | Comfort Seeker | "sedap ke?" | Lihat Menu Signature |
| 3 | **Why Sofwah** | Trust | "I can trust this" | Family Provider | "sesuai family/parents?", "bersih?" | — |
| 4 | **Signature Menu** | Craving | "I want THAT dish" | Group / Comfort | "portion kecil?", "sedap ke?" | Order Sekarang |
| 5 | **Wall of Love** | REVIEW / Trust | "Real people love it" | Young Professional | "sedap ke?", "servis lambat?" | Baca lagi review |
| 6 | **Brand Story** | Emotional connection | "I believe in them" | Parent-Appreciation | trust / authenticity | — |
| 7 | **Branch Experience** | REACH | "There's one near me" | Family Provider | "jauh ke?", parking | Navigate · Cari Terdekat |
| 8 | **Family Dining** | Emotion > transaction | "This is where memory happens" | Celebration Planner | "sesuai raikan?" | Tempah / Raikan Bersama |
| 9 | **FAQ** | Confidence | "No more doubts" | All | halal, booking, group, parking, delivery | — (feeds FAQPage schema) |
| 10 | **Final Conversion** | Action | "Let's go" | All | last friction | Order Sekarang · Cari Cawangan |
| 11 | **Footer** | — | trust close | All | legal / contact | socials, hours |

**Persistent:** Sticky mobile CTA bar (Order Sekarang / Cari Cawangan) + glass nav with
EN/BM toggle.

---

## C. UX STRATEGY & EMOTIONAL JOURNEY MAP

**Master arc:** Curiosity → Interest → Desire → Craving → Trust → Confidence → Action.

```
SCROLL DEPTH →   0%        15%        30%        45%       60%        75%       90%       100%
SECTION          Hero  →  Dining  →  Why    →  Menu   →  Reviews → Story  → Branch → Family → FAQ → Close
EMOTION       Curiosity  Desire   Trust     Craving   Trust     Belief   Reach   Memory  Calm  Action
7R            REALIZE    RASA     —         RASA      REVIEW    —        REACH   —       —     REPEAT/RETURN
SENSE         Sight+    Smell+   —         Taste+    —         —        —       Touch+  —     —
              Sound     Taste              Sight              (warmth)         (togeth)
```

**5-Senses encoding (Sight/Sound/Smell/Taste/Touch)** delivered through copy + motion +
photography so the page *feels* like walking into Sofwah:
- **Sight** — cinematic dark canvas, grill glow, warm highlights, shallow depth of field.
- **Sound** — implied via motion cadence (sizzle-timed reveals), optional muted hero loop.
- **Smell** — copy triggers ("aroma rempah Arab", "asap panggangan").
- **Taste** — macro food texture, grill marks, mendy rice grains, salsa sheen.
- **Touch** — family/togetherness imagery, warm hospitality moments.

**Fear Map → proof placement (every fear answered on-page):**
| Fear | Where neutralized | Proof device |
|---|---|---|
| "sedap ke?" | Dining, Menu, Reviews | macro photography + Google ratings |
| "mahal ke?" | Why Sofwah, Family | "premium tapi berbaloi" framing (never discount-shouty) |
| "portion kecil?" | Menu, Family | portion/sharing-platter shots |
| "sesuai family & parents?" | Why, Family, Reviews | real family moments, parent-appreciation copy |
| "bersih ke?" | Why Sofwah | cleanliness/ambience cues, kitchen professionalism |
| "servis lambat?" | Reviews, FAQ | service-champion testimonials, FAQ answer |

**Marketing Decision Filter** applied to every section (trust ↑, appetite ↑, premium-but-
approachable ↑, modern, Muslim-family comfort, SALWA-aligned, emotional memory, pride).

---

## D. HI-FI WIREFRAME STRUCTURE (per section)

Layout skeletons (mobile-first; desktop enhancements noted). Motion respects
`prefers-reduced-motion` (static fallback for every animated element).

### 1. Hero Experience — REALIZE
```
┌───────────────────────────────────────────┐
│ [glass nav: logo · links · EN/BM · Order]  │  sticky, blur 28px
├───────────────────────────────────────────┤
│                                            │
│   full-viewport cinematic bg               │  AVIF, fetchpriority=high, preload
│   (family + grill glow + smoke)            │  GSAP: slow scale-in + light bloom
│                                            │
│   H1 (Poppins 700, cinematic)              │  emotional headline, not slogan
│   subline (Poppins 400, text-2)            │
│                                            │
│   [ Order Sekarang ]  [ Cari Cawangan ]    │  brand CTA + glass secondary
│                                            │
│   trust strip: ★ rating · 6 cawangan ·     │  small, gold accents
│   ribuan pelanggan                         │
└───────────────────────────────────────────┘
        ↓ scroll cue (subtle, animated)
```
Fallback: static hero image, no scale/bloom, CTAs immediately interactive.

### 2. Signature Dining — RASA
```
Full-bleed cinematic band(s). Alternating pinned macro shots (ScrollTrigger):
meat texture → smoke → mendy rice → salsa. Minimal text overlay, sensory one-liners
in Tajawal accent for dish/Arabic phrases. Goal: cipta lapar. No cards.
```

### 3. Why Sofwah — Trust (Before → After)
```
┌── Before ──────────┬── After ───────────────┐
│ "Kebanyakan resto  │ "Sofwah hidang         │
│  hidang makanan    │  PENGALAMAN keluarga    │
│  sahaja."          │  Arab yang bermakna."   │
└────────────────────┴────────────────────────┘
[ 3–4 proof tiles: Authentic ingredients · Clean & professional ·
  Family-friendly · Consistent SOP ]  ← glass cards, gold micro-icons
```

### 4. Signature Menu — Craving (storytelling, NOT menu cards)
```
Per hero dish (Mendy · Grill Platter · Grilled Lamb · Grilled Chicken ·
Family Sharing · Sofwah Special Salsa), a story block:
  [ macro photo ]  Apa dia · Kenapa istimewa · Kenapa pelanggan suka ·
                   Emosi yang dicipta   → outcome-led, not ingredient list
  inline CTA: Order Sekarang
```

### 5. Wall of Love — REVIEW
```
Social-media-style Google review cards (Livewire ReviewWall):
[ filter: cawangan ▾ · rating ▾ ]
┌ ★★★★★  avatar  name ┐ ┌ …UGC photo… ┐ ┌ … ┐   masonry / marquee
│ "…organic quote…"   │ │ Google badge │ │   │   real, never corporate
└─────────────────────┘ └──────────────┘ └───┘
Only real review data feeds AggregateRating schema.
```

### 6. Brand Story — emotional
```
Cinematic split: founder/kitchen imagery + narrative.
Kenapa Sofwah wujud · komitmen authenticity · quality · family values ·
barakah-driven disciplined growth. Warm, human, Caregiver+Ruler tone.
```

### 7. Branch Experience — REACH (bento, faham dalam 3 saat)
```
┌──────────┬──────────┐  6-branch bento (Livewire BranchSelector)
│ Gurun    │ K.Nerang │  each tile: name · hours · phone ·
├──────────┼──────────┤  [ Navigate (Maps deep link) ] · highlight
│ S.Petani │ AS-Pegawai│  "Cari Cawangan Terdekat" → nearest by geo
├──────────┼──────────┤
│ AS-Aman  │ Jitra    │  mobile: 1-col stack, thumb-reach CTAs
└──────────┴──────────┘
```

### 8. Family Dining — emotion over transaction
```
Full-bleed gathering/celebration imagery. "Tempat memori tercipta."
belanja parents · birthdays · togetherness. CTA: Tempah / Raikan Bersama.
```

### 9. FAQ — Confidence (feeds FAQPage schema)
```
Accordion (Alpine): halal · booking · group order · parking · delivery ·
celebration packages · portion · price. Each answer = objection neutralized.
```

### 10. Final Conversion — Action
```
High-contrast close band. Strong single message + dual CTA:
[ Order Sekarang ]   [ Cari Cawangan Terdekat ]
```

### 11. Footer
```
nav · 6 branches (name/hours/contact) · socials · legal · brand mark.
```

### Persistent — Mobile Sticky CTA (Livewire StickyOrderSheet)
```
appears after hero scroll-past; always thumb-reachable:
[  Order Sekarang  |  Cari Cawangan  ]   glass, brand + accent
```

---

## E. CONTENT SKELETON (BM-primary + EN toggle)

**Source of truth:** `resources/content/bm.php` + `resources/content/en.php` (mirrored keys).
Copy is editable without touching templates. All keys BM-first; EN is a faithful,
equally-warm mirror (not literal). Arabic dish names / ornaments render in **Tajawal**.

**Key namespace (skeleton — full copy drafted in Phase 2):**
```
nav.*            (order, cari_cawangan, menu, cerita, lang_toggle)
hero.headline    hero.subline    hero.cta_primary    hero.cta_secondary
hero.trust.rating  hero.trust.branches  hero.trust.customers
dining.*         (sensory one-liners × hero dishes)
why.before  why.after  why.proof.[authentic|clean|family|sop]
menu.[mendy|platter|lamb|chicken|sharing|salsa].{name,apa,istimewa,suka,emosi}
reviews.heading  reviews.subheading
story.heading  story.body_1  story.body_2  story.founder_line
branch.heading   branch.[gurun|knerang|spetani|as_pegawai|as_aman|jitra].{hours,phone,highlight}
family.heading   family.body   family.cta
faq.[q1..qN].{q,a}
final.heading  final.subheading  final.cta_primary  final.cta_secondary
footer.*
```

**Sample copy (direction proof — PESONA formula applied):**

> **hero.headline (BM):** "Bukan sekadar tempat makan. Tempat untuk orang yang kita sayang."
> **hero.subline (BM):** "Rasa Arab yang warm, suasana mesra keluarga, dan setiap hidangan
> yang buat setiap moment jadi lebih bermakna."
> **hero.headline (EN):** "More than a place to eat. A place for the people you love."

> **menu.chicken (BM):** "Ayam panggang sempurna, disaluti rempah Arab yang mengundang
> selera — hidangan yang menyatukan keluarga di satu meja."

> **why.before / why.after (BM):** "Kebanyakan restoran hidang makanan sahaja. Sofwah
> hidang *pengalaman* keluarga Arab yang bermakna."

Voice: warm · confident · family-oriented · Muslim-friendly · lightly-premium. Never
childish, cold-corporate, aggressive, or cheap.

---

## F. APP / ROUTE STRUCTURE (preview — implemented Phase 1+)

```
routes/web.php        GET /            → LandingController (single page, sections)
                      GET /sitemap.xml → sitemap
                      POST livewire endpoints (reservation, etc.)
app/Http/Controllers/ LandingController
app/Livewire/         ReservationForm · ReviewWall · BranchSelector · StickyOrderSheet
app/Models/           Lead · Review · Branch
database/migrations/  leads · reviews · branches
resources/views/
  layouts/app.blade.php
  components/          hero · dish-story · bento-branches · review-card · glass-card ·
                      section-heading · cta-buttons · trust-strip
  content/            bm.php · en.php
tailwind.config.js    Sofwah design tokens (Section 10)
```

---

## G. INPUTS NEEDED FROM CEO (not blocking Phase 0 approval)

Flagged now; needed at the phase noted:

1. **Order channel wiring (needed by Phase 4):** per-branch — WhatsApp order link /
   FoodPanda / GrabFood / in-house? (Primary CTA "Order Sekarang" wires to this.)
2. **Brand Library access (needed for Phase 1 design):** logo files, real photography,
   any existing brand guide from your Google Drive folder. I can pull these directly if
   you grant Drive access, or you can drop specific files.
3. **Real branch data (needed by Phase 3):** full address, geo (lat/lng), operating hours,
   phone per each of the 6 branches — for the branch bento + per-branch LocalBusiness schema.
4. **Live proof (needed by Phase 3/5):** actual Google rating, review count, "ribuan
   pelanggan" figure — schema uses **real data only** (no fabricated AggregateRating).
5. **GA4 ID + repo:** GA4 measurement ID; confirm private GitHub repo `sofwah-web`
   (I will not init/push infra without your go-ahead).

---

## H. ⛔ PHASE 0 GATE

**Deliverered:** IA (final) · UX + emotional journey map · hi-fi wireframe structure per
section · stack confirmation (Primary, Forge-ready) · BM/EN content skeleton.

**Awaiting CEO decision to proceed to Phase 1 — Design System** (Tailwind tokens, self-
hosted Poppins + Tajawal, color-ratio proof 70/15/10/5, component inventory, 1 hero
component). No further code until approved.
