# SOFWAH-WEB — PHASE 1 DESIGN SYSTEM
### Brand DNA tokens · Typography · Motion · Component inventory · Asset manifest
**Status:** ⛔ Awaiting CEO (Abu) approval to advance to Phase 2 (Core Build)
**Date:** 2026-07-09 · Governing: Master prompt §10 + `sofwah-brand-dna-pesona-skill`

---

## 1. COLOR SYSTEM (exact DNA tokens — no invented shades)

| Token (Tailwind) | Hex | Role | Target ratio |
|---|---|---|---|
| `bg` | `#0B0B0D` | Primary background — hero, immersive sections | **70%** |
| `surface` | `#151517` | Cards, bento, testimonial panels | (within dark) |
| `brand` | `#730D04` | Deep Arabic Red — primary CTA, active states | **15%** |
| `accent` | `#FF9A06` | Golden Orange — hover, ratings, interactive highlights | **10%** |
| `gold` | `#FFDA7C` | Luxury Gold — signature/VIP badges, sparingly | **5%** |
| `ink` | `#FFFFFF` | Primary text / headlines | — |
| `ink-2` | `#D1D5DB` | Body text | — |
| `ink-3` | `#9CA3AF` | Captions, meta | — |

**Mandatory distribution — 70 / 15 / 10 / 5.** Enforced by convention + review:
- Red & orange never used as large page backgrounds; no "promo-banner" aesthetics.
- **State rule (Brand DNA compliance):** hover/active never introduce new hex values.
  CTA = `brand`; hover = `brightness-110` + `shadow-glow` (accent-based glow) or shift to
  `accent`; focus ring = `accent`. Opacity/glow only — **no invented tints**.
- Emotional goals: dark = luxury/focus/trust · red = warmth/authenticity/memory ·
  orange = appetite/energy/action · gold = exclusivity/celebration.

**Glassmorphism (nav, floating cards, testimonials, bento):**
`background: rgba(255,255,255,.05)` · `border: rgba(255,255,255,.08)` · `blur: 28px`
→ Tailwind: `.glass` component class + `backdrop-blur-glass`.

---

## 2. TYPOGRAPHY SYSTEM (self-hosted · locked)

- **Display + Body:** `Poppins` (400/500/600/700/800).
- **Arabic / accent script** (dish names, Arabic phrases, ornaments): `Tajawal` (400/500/700).
- Self-hosted WOFF2 in `resources/fonts/` (copied to `public/fonts/`), `font-display: swap`.
  **Preload** the hero weight (`poppins-700`/`poppins-800`) + `poppins-400` in `<head>`.
- Subsets are small (~8 KB each) → protects LCP. Tajawal split into Latin + Arabic
  `unicode-range` so Arabic glyphs load only when Arabic text is present.

**Type scale (mobile → desktop):**

| Level | Font / weight | Size (mobile → desktop) | Line-height | Use |
|---|---|---|---|---|
| H1 | Poppins 800 | 2.25rem → 4.5rem | 1.08 | Hero cinematic statements |
| H2 | Poppins 700 | 1.75rem → 3rem | 1.15 | Section storytelling |
| H3 | Poppins 600 | 1.25rem → 1.75rem | 1.25 | Supporting emphasis |
| Body | Poppins 400 | 1rem → 1.125rem | ≥1.6 | Readable body (min 16px mobile) |
| Meta | Poppins 500 | 0.8125–0.875rem | 1.4 | Captions, trust strip |
| Accent | Tajawal 500/700 | contextual | 1.3 | Arabic dish names / ornaments |

Spacing on an **8px grid**; generous whitespace = premium breathing room.

---

## 3. MOTION GUIDELINES (cinematic, lightweight)

- **GSAP + ScrollTrigger** for scroll-reveal, parallax, pinned signature scenes.
- **Lenis** for premium smooth-scroll (main-thread friendly).
- **Hero timeline** (see `components/hero.blade.php`): slow 12s media scale (1.0→1.06),
  staggered content reveal (y+opacity), looping scroll cue.
- **Every animation guarded by `prefers-reduced-motion`** → static fallback, content fully
  usable, no parallax/pinning. Global CSS kill-switch in `app.css`.
- Motion never blocks interaction; CTAs are clickable immediately (no entrance gating).
- Budget: no layout jank (CLS < 0.05); code-split GSAP; defer non-critical JS.

---

## 4. COMPONENT INVENTORY

| Component | Type | Section | Phase |
|---|---|---|---|
| `layouts/app.blade.php` | layout | global (head, nav, footer, mobile CTA) | 2 |
| `components/hero.blade.php` | Blade | Hero | **1 ✅** |
| `components/section-heading.blade.php` | Blade | all | 2 |
| `components/cta-buttons.blade.php` | Blade | all | 2 |
| `components/glass-card.blade.php` | Blade | all | 2 |
| `components/trust-strip.blade.php` | Blade | Hero / Why | 2 |
| `components/dish-story.blade.php` | Blade | Signature Menu | 2 |
| `components/bento-branches.blade.php` | Blade | Branch | 3 |
| `components/review-card.blade.php` | Blade | Wall of Love | 3 |
| `livewire/ReviewWall` | Livewire | Wall of Love | 3/4 |
| `livewire/BranchSelector` | Livewire | Branch | 3/4 |
| `livewire/ReservationForm` | Livewire | Family / Conversion | 4 |
| `livewire/StickyOrderSheet` | Livewire | persistent mobile CTA | 4 |

Design primitives available now: `.glass`, `bg-brand` CTA, `shadow-glow` hover,
`rounded-xl2/xl3`, `font-display/arabic`, `max-w-content`, ink text ramp.

---

## 5. BRAND ASSET MANIFEST (Google Drive → project)

Real photography only (Brand DNA forbids stock / AI-looking food). Source: **BRAND LIBRARY**
(`1hpmILs-dNwSw-fezP6BIQnoRxurLuogX`). Assets are exported → optimized (AVIF/WebP) in the
Phase 5 image pipeline; vendored into `resources/` / `public/` as needed.

| Asset | Drive ID | Maps to | Status |
|---|---|---|---|
| Logo — White Horizontal | `1Rsy2WLkMxGZyyLKfRfMz2T_OI1DQsybE` | nav (dark), hero | **vendored ✅** `resources/brand/` |
| Logo — White Square | `1txx2Z-vnLew3e9qkTqBIT3m5PhQBPXJq` | favicon / OG / mobile | Phase 2 |
| Logo — Red Horizontal | `1oKlAqrwE8MiMQfO2qb7fv_PY6SR92vlS` | light surfaces / print | Phase 2 |
| Logo — vector (.ai) | `1iCt1yYrMqOfiJE8D2xVSZd8j5BMTL217` | master source | ref |
| Cover Home Page | `1OOCT6GO4Njbb5cD-c8LsEk2K7pEja9qp` | **Hero background** | Phase 2 |
| Peta Sofwah (branch map) | `1pIbeGTgQXed5QzbHsctua4tQqBgLWELn` | Branch section | Phase 3 |
| A01 Classic Chicken Mendy | `1TX5ktCWAtWX2bMlVm79mVo8FStDRD39F` | Signature Menu (Mendy) | Phase 2 |
| AF1 Arabic Grill Platter | `1KDHcGUp6-grU8P-B58nCaMuG5Y_5UBJO` | Signature Menu (Platter) | Phase 2 |
| W07 Lamb Mashwi | `1T4akh2BwsSRjri2_rJo3uBW35gSEKJBL` | Signature Menu (Grilled Lamb) | Phase 2 |
| W05 Arabiata Chicken Grill | `1aDrAYT_VDcl0OJaW35glOqko_6158HgF` | Signature Menu (Grilled Chicken) | Phase 2 |
| SK05 As Sofwah Platter | `1re0w3J164xYyVrVFf5GJa54yq8JZceFG` | Family Sharing | Phase 2/3 |
| Ambience / family covers | folder `1gJlh9fEFe1oVOfUeobvmG4r92zLM1r2b` | Why / Family / ambience | Phase 2/3 |
| Brand icons (1–7.png) | folder `1Qu_SP3Hbeis7UbM-cshsQSBb2MI5jHGz` | proof tiles / UI | Phase 2 |

> `MENU AI` folder is intentionally **not** used for hero/signature imagery — Brand DNA
> prioritizes authentic photography over AI-looking visuals.

---

## 6. FILES DELIVERED THIS PHASE

- `tailwind.config.js` — Sofwah tokens (8 official colors, fonts, radius, glass blur, glow)
- `resources/css/app.css` — self-hosted @font-face, CSS variables, `.glass`, reduced-motion
- `resources/fonts/*.woff2` — Poppins 400–800, Tajawal 400/500/700 (Latin+Arabic)
- `resources/brand/logo-sofwah-white-horizontal.png` — real brand mark (vendored)
- `resources/views/components/hero.blade.php` — **the Phase 1 hero component**
- **Visual proof** rendered as an Artifact (color ratio, type scale, hero mockup)

**Marketing Decision Filter:** dark premium canvas + warm grill glow + real photography +
family-first hero copy → increases trust, appetite, premium-but-approachable perception,
modern feel, and emotional memory. ✅ Passes.
