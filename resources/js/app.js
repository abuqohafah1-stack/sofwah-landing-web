/*
 * Alpine is provided by Livewire 3. This module owns analytics + cinematic
 * motion. GSAP/Lenis are dynamically imported (separate chunk, after first
 * paint). ALL motion is skipped for prefers-reduced-motion (WCAG 2.1 AA).
 */

// GA4 events (no-op until GA4 is configured).
const track = (name, params = {}) => {
    if (typeof window.gtag === 'function') window.gtag('event', name, params);
};
track('view_hero');
document.addEventListener('click', (e) => {
    const a = e.target.closest('a');
    if (!a) return;
    const href = a.getAttribute('href') || '';
    if (/wasap\.my|wa\.me/.test(href)) track('click_order', { link_url: href });
    else if (/maps\.app\.goo\.gl|goo\.gl\/maps/.test(href)) track('click_branch', { link_url: href });
});

if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    Promise.all([
        import('gsap'),
        import('gsap/ScrollTrigger'),
        import('lenis'),
    ]).then(([{ default: gsap }, { ScrollTrigger }, { default: Lenis }]) => {
        gsap.registerPlugin(ScrollTrigger);

        /* ---- Premium smooth scroll ---- */
        const lenis = new Lenis({ lerp: 0.11, smoothWheel: true });
        const raf = (t) => { lenis.raf(t); requestAnimationFrame(raf); };
        requestAnimationFrame(raf);
        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.lagSmoothing(0);

        /* ---- Hero: orchestrated entrance ---- */
        gsap.timeline({ defaults: { ease: 'power3.out' } })
            .from('#hero [data-hero-el]', { y: 30, opacity: 0, duration: 0.9, stagger: 0.14, delay: 0.1 })
            .from('#hero [data-float] > *', { opacity: 0, y: 20, scale: 0.94, duration: 0.7, stagger: 0.12 }, '-=0.5');

        gsap.to('[data-hero-scrollcue]', { y: 7, opacity: 0.2, repeat: -1, yoyo: true, duration: 1.1, ease: 'sine.inOut' });

        /* ---- Scroll reveals (single elements) ---- */
        gsap.utils.toArray('[data-reveal]').forEach((el) => {
            gsap.from(el, {
                opacity: 0, y: 34, duration: 0.9, ease: 'power3.out',
                scrollTrigger: { trigger: el, start: 'top 86%' },
            });
        });

        /* ---- Scroll reveals (staggered groups: grids, rows) ---- */
        gsap.utils.toArray('[data-reveal-stagger]').forEach((group) => {
            gsap.from(group.children, {
                opacity: 0, y: 30, scale: 0.97, duration: 0.7, ease: 'power3.out', stagger: 0.08,
                scrollTrigger: { trigger: group, start: 'top 84%' },
            });
        });

        /* ---- Count-up stats ---- */
        gsap.utils.toArray('[data-count]').forEach((el) => {
            const end = parseFloat(el.dataset.count);
            const decimals = /\./.test(el.dataset.count) ? 1 : 0;
            const suffix = el.dataset.suffix || '';
            const state = { v: 0 };
            gsap.to(state, {
                v: end, duration: 1.8, ease: 'power2.out',
                scrollTrigger: { trigger: el, start: 'top 92%', once: true },
                onUpdate: () => {
                    const n = decimals ? state.v.toFixed(1) : Math.round(state.v).toLocaleString('en-US');
                    el.textContent = n + suffix;
                },
            });
        });

        /* ---- Gentle parallax on tagged images ---- */
        gsap.utils.toArray('[data-parallax] img, img[data-parallax]').forEach((img) => {
            gsap.to(img, {
                yPercent: -8, ease: 'none',
                scrollTrigger: { trigger: img, start: 'top bottom', end: 'bottom top', scrub: true },
            });
        });

        /* ---- Cursor-parallax 3D tilt on the hero food card (fine pointers only) ---- */
        const tilt = document.querySelector('[data-tilt]');
        if (tilt && window.matchMedia('(pointer:fine)').matches) {
            const inner = tilt.querySelector('[data-tilt-inner]') || tilt;
            const setX = gsap.quickTo(inner, 'rotationY', { duration: 0.6, ease: 'power3' });
            const setY = gsap.quickTo(inner, 'rotationX', { duration: 0.6, ease: 'power3' });
            tilt.addEventListener('mousemove', (e) => {
                const r = tilt.getBoundingClientRect();
                const px = (e.clientX - r.left) / r.width - 0.5;
                const py = (e.clientY - r.top) / r.height - 0.5;
                setX(px * 16);
                setY(py * -12);
            });
            tilt.addEventListener('mouseleave', () => { setX(0); setY(0); });
        }
    });
}
