/*
 * Alpine is provided by Livewire 3. This module owns analytics + cinematic
 * motion. Count-up is a standalone IntersectionObserver (reliable, runs even
 * before GSAP loads). GSAP/Lenis are dynamically imported for scroll reveals /
 * tilt. ALL motion respects prefers-reduced-motion (WCAG 2.1 AA).
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

/* ---- Count-up numbers (robust: IntersectionObserver + rAF) ---- */
(function () {
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const nums = document.querySelectorAll('[data-count]');
    if (!nums.length) return;

    const fmt = (v, dec) => (dec ? v.toFixed(1) : Math.round(v).toLocaleString('en-US'));

    const run = (el) => {
        const end = parseFloat(el.dataset.count);
        if (isNaN(end)) return;
        const dec = /\./.test(el.dataset.count) ? 1 : 0;
        const suf = el.dataset.suffix || '';
        if (reduce) { el.textContent = fmt(end, dec) + suf; return; }
        const dur = 1800;
        let t0 = null;
        const step = (ts) => {
            if (t0 === null) t0 = ts;
            const p = Math.min((ts - t0) / dur, 1);
            const v = end * (1 - Math.pow(1 - p, 3)); // easeOutCubic
            el.textContent = fmt(v, dec) + suf;
            if (p < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
    };

    if (!('IntersectionObserver' in window)) { nums.forEach(run); return; }
    const io = new IntersectionObserver((entries) => {
        entries.forEach((e) => { if (e.isIntersecting) { run(e.target); io.unobserve(e.target); } });
    }, { threshold: 0.5 });
    nums.forEach((el) => io.observe(el));
})();

/* ---- GSAP scroll reveals + tilt (dynamically imported) ---- */
if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    Promise.all([
        import('gsap'),
        import('gsap/ScrollTrigger'),
        import('lenis'),
    ]).then(([{ default: gsap }, { ScrollTrigger }, { default: Lenis }]) => {
        gsap.registerPlugin(ScrollTrigger);

        const lenis = new Lenis({ lerp: 0.11, smoothWheel: true });
        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.add((time) => lenis.raf(time * 1000));
        gsap.ticker.lagSmoothing(0);

        gsap.timeline({ defaults: { ease: 'power3.out' } })
            .from('#hero [data-hero-el]', { y: 30, opacity: 0, duration: 0.9, stagger: 0.14, delay: 0.1 })
            .from('#hero [data-float] > *', { opacity: 0, y: 20, scale: 0.94, duration: 0.7, stagger: 0.12 }, '-=0.5');

        gsap.to('[data-hero-scrollcue]', { y: 7, opacity: 0.2, repeat: -1, yoyo: true, duration: 1.1, ease: 'sine.inOut' });

        gsap.utils.toArray('[data-reveal]').forEach((el) => {
            gsap.from(el, { opacity: 0, y: 34, duration: 0.9, ease: 'power3.out',
                scrollTrigger: { trigger: el, start: 'top 86%' } });
        });

        gsap.utils.toArray('[data-reveal-stagger]').forEach((group) => {
            gsap.from(group.children, { opacity: 0, y: 30, scale: 0.97, duration: 0.7, ease: 'power3.out', stagger: 0.08,
                scrollTrigger: { trigger: group, start: 'top 84%' } });
        });

        gsap.utils.toArray('[data-parallax] img, img[data-parallax]').forEach((img) => {
            gsap.to(img, { yPercent: -8, ease: 'none',
                scrollTrigger: { trigger: img, start: 'top bottom', end: 'bottom top', scrub: true } });
        });

        const tilt = document.querySelector('[data-tilt]');
        if (tilt && window.matchMedia('(pointer:fine)').matches) {
            const inner = tilt.querySelector('[data-tilt-inner]') || tilt;
            const setX = gsap.quickTo(inner, 'rotationY', { duration: 0.6, ease: 'power3' });
            const setY = gsap.quickTo(inner, 'rotationX', { duration: 0.6, ease: 'power3' });
            tilt.addEventListener('mousemove', (e) => {
                const r = tilt.getBoundingClientRect();
                setX(((e.clientX - r.left) / r.width - 0.5) * 16);
                setY(((e.clientY - r.top) / r.height - 0.5) * -12);
            });
            tilt.addEventListener('mouseleave', () => { setX(0); setY(0); });
        }

        ScrollTrigger.refresh();
    });
}
