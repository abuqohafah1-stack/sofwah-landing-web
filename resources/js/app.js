/*
 * Alpine is provided by Livewire 3. Count-up + scroll reveals use a robust
 * IntersectionObserver (they run even if GSAP is slow/fails, and never leave
 * content stuck invisible). GSAP/Lenis add hero entrance, parallax and tilt.
 * ALL motion respects prefers-reduced-motion (WCAG 2.1 AA).
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

const REDUCE = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/* ---- Count-up numbers (IntersectionObserver + rAF) ---- */
(function () {
    const nums = document.querySelectorAll('[data-count]');
    if (!nums.length) return;
    const fmt = (v, dec) => (dec ? v.toFixed(1) : Math.round(v).toLocaleString('en-US'));
    const run = (el) => {
        const end = parseFloat(el.dataset.count);
        if (isNaN(end)) return;
        const dec = /\./.test(el.dataset.count) ? 1 : 0;
        const suf = el.dataset.suffix || '';
        if (REDUCE) { el.textContent = fmt(end, dec) + suf; return; }
        let t0 = null;
        const step = (ts) => {
            if (t0 === null) t0 = ts;
            const p = Math.min((ts - t0) / 1800, 1);
            el.textContent = fmt(end * (1 - Math.pow(1 - p, 3)), dec) + suf;
            if (p < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
    };
    if (!('IntersectionObserver' in window)) { nums.forEach(run); return; }
    const io = new IntersectionObserver((es) => {
        es.forEach((e) => { if (e.isIntersecting) { run(e.target); io.unobserve(e.target); } });
    }, { threshold: 0.5 });
    nums.forEach((el) => io.observe(el));
})();

/* ---- Scroll reveals (IntersectionObserver; never leaves content invisible) ---- */
(function () {
    if (REDUCE) return; // leave everything visible
    const singles = [].slice.call(document.querySelectorAll('[data-reveal]'));
    const groups = [].slice.call(document.querySelectorAll('[data-reveal-stagger]'));
    if (!singles.length && !groups.length) return;

    const hide = (el) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(28px)';
        el.style.transition = 'opacity .7s cubic-bezier(.2,.7,.2,1), transform .7s cubic-bezier(.2,.7,.2,1)';
    };
    const show = (el, delay) => {
        el.style.transitionDelay = (delay || 0) + 'ms';
        el.style.opacity = '1';
        el.style.transform = 'none';
    };

    singles.forEach(hide);
    groups.forEach((g) => [].forEach.call(g.children, hide));

    if (!('IntersectionObserver' in window)) {
        singles.forEach((el) => show(el));
        groups.forEach((g) => [].forEach.call(g.children, (c) => show(c)));
        return;
    }

    const io = new IntersectionObserver((es) => {
        es.forEach((e) => {
            if (!e.isIntersecting) return;
            const el = e.target;
            if (el.hasAttribute('data-reveal-stagger')) {
                [].forEach.call(el.children, (c, i) => show(c, i * 80));
            } else {
                show(el);
            }
            io.unobserve(el);
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });

    singles.forEach((el) => io.observe(el));
    groups.forEach((el) => io.observe(el));

    // Safety net: never leave anything hidden.
    setTimeout(() => {
        singles.forEach((el) => show(el));
        groups.forEach((g) => [].forEach.call(g.children, (c) => show(c)));
    }, 3500);
})();

/* ---- GSAP hero entrance + parallax + tilt (dynamically imported) ---- */
if (!REDUCE) {
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
    });
}
