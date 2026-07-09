# SOFWAH-WEB — PHASE 5 SEO / PERFORMANCE / ACCESSIBILITY
**Status:** ⛔ Awaiting CEO (Abu) approval to advance to Phase 6 (Forge deployment)
**Date:** 2026-07-09

---

## SEO / Structured data
- `app/Support/StructuredData.php` — dependency-free, unit-tested builder. Emits a JSON-LD
  `@graph`: **Organization** + **6× Restaurant/LocalBusiness** (name, telephone from WhatsApp,
  servesCuisine Arabic/Middle Eastern/Halal, priceRange, city-level PostalAddress, areaServed,
  hasMap, `geo` where resolved) + **FAQPage** (6 Q&A). Validated: 8 nodes, valid JSON.
- Injected in `<head>` via the controller (`schemaJson`) — real data only. **AggregateRating
  intentionally omitted** (needs real ratingCount) — add when review counts are available.
  **streetAddress + openingHours = TODO** (city-level only) until CEO provides them.
- `<link rel="canonical">` per language; OG/Twitter cards (cinematic hero) in layout.
- `routes/web.php`: dynamic **`/robots.txt`** + **`/sitemap.xml`** (BM + EN), follow `APP_URL`.
- Semantic HTML5 landmarks: `header/nav/main/section/article/footer`; heading hierarchy H1→H3.
- `hreflang` on the BM/EN toggle.

## Performance
- **JS code-split**: `app.js` initial chunk **2.24 kB** (gzip 1.21). GSAP + ScrollTrigger +
  Lenis are **dynamically imported** (separate chunks, ~27 kB gzip total) only after first
  paint, and skipped entirely under `prefers-reduced-motion`.
- **Images**: `scripts/optimize-images.mjs` (sharp) generates **AVIF + WebP** for every photo;
  `<x-img>` serves `<picture>` AVIF → WebP → JPEG. **AVIF ≈ 62% smaller than JPEG** (1899 → 726 KB).
- Hero image preloaded, `fetchpriority="high"`, `loading="eager"`, dimensions set (CLS guard).
  Below-the-fold media `loading="lazy"`. Self-hosted fonts (~8 KB subsets), `font-display: swap`.
- CSS 22.9 kB (5.3 kB gzip). Forge/Cloudflare: Brotli + HTTP/2 + edge cache (Phase 6).

## Accessibility (WCAG 2.1 AA) — checklist
- [x] Colour contrast ≥ 4.5:1 for text (white/`#D1D5DB`/`#9CA3AF`/`#FF9A06`/`#FFDA7C` on `#0B0B0D`)
- [x] Visible keyboard focus (`focus-visible` outlines on CTAs, FAQ, form fields)
- [x] Semantic landmarks + skip-to-content link
- [x] `alt` on meaningful images; `alt=""` on decorative (dining/hero scrim, gradients)
- [x] Forms: `<label for>` on every field, inline error messages, autocomplete hints
- [x] Order sheet: `role="dialog"`, `aria-modal`, `aria-label`, Esc to close
- [x] `prefers-reduced-motion` disables all motion; content fully usable
- [x] `hreflang` + `aria-current` on language toggle
- [ ] **Verify on staging** with axe / Lighthouse (needs the running app — Phase 6): focus-trap
      in the order sheet, live-region announcement on review filter, real contrast audit.

## Performance budget (targets — measured on staging, Phase 6)
- Lighthouse ≥ 95 (Perf / SEO / Best-Practices / A11y) · CWV green
- LCP < 2.0s · CLS < 0.05 · INP < 200ms

## Honest note
Lighthouse / axe require the running Laravel app (Composer + skeleton) — measured on the
Forge **staging** deploy in Phase 6, not locally. All Phase 5 code is verified by unit test
(schema), successful build (code-split + images), and inspection.

## Next — Phase 6 (Forge deployment)
Staging deploy, deploy script, Let's Encrypt SSL, Forge scheduler + Redis queue worker,
Cloudflare, then Lighthouse/axe verification. **Production go-live = CEO only.**
