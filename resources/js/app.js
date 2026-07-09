/*
 * Alpine is provided and started by Livewire 3 — do NOT import/start another
 * instance here. This module owns analytics + cinematic motion. GSAP/Lenis are
 * dynamically imported (a separate chunk) so they never block first paint, and
 * all motion is skipped for reduced-motion users (WCAG 2.1 AA).
 */

// GA4 events (no-op until GA4 is configured in .env).
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

        const lenis = new Lenis({ lerp: 0.12, smoothWheel: true });
        const raf = (time) => { lenis.raf(time); requestAnimationFrame(raf); };
        requestAnimationFrame(raf);
        lenis.on('scroll', ScrollTrigger.update);

        gsap.from('#hero [data-hero-el]', {
            y: 24, opacity: 0, duration: 0.9, ease: 'power3.out', stagger: 0.12, delay: 0.15,
        });
        gsap.to('#hero [data-hero-media] img', {
            scale: 1.08, ease: 'none',
            scrollTrigger: { trigger: '#hero', start: 'top top', end: 'bottom top', scrub: true },
        });
        gsap.to('[data-hero-scrollcue]', {
            y: 7, opacity: 0.25, repeat: -1, yoyo: true, duration: 1.1, ease: 'sine.inOut',
        });

        document.querySelectorAll('[data-reveal]').forEach((el) => {
            gsap.from(el, {
                y: 28, opacity: 0, duration: 0.8, ease: 'power2.out',
                scrollTrigger: { trigger: el, start: 'top 85%' },
            });
        });
    });
}
