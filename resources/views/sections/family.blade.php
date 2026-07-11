{{-- sections/family.blade.php — emotion over transaction · full-bleed cinematic --}}
<section id="family" class="relative overflow-hidden border-t border-white/5">
    <div class="absolute inset-0" aria-hidden="true" data-parallax>
        <x-img src="images/menu-ai/family-platter.jpg" alt="" class="h-[115%] w-full object-cover" />
        <div class="absolute inset-0" style="background:
            radial-gradient(80% 70% at 28% 22%, rgba(115,13,4,.50), transparent 62%),
            radial-gradient(60% 60% at 90% 90%, rgba(255,154,6,.16), transparent 60%),
            linear-gradient(180deg, rgba(11,11,13,.84) 0%, rgba(11,11,13,.70) 50%, rgba(11,11,13,.92) 100%)"></div>
    </div>

    <div class="relative mx-auto max-w-content px-6 py-32 text-center md:py-44" data-reveal>
        <span class="text-xs font-semibold uppercase tracking-[0.22em] text-accent">{{ $c['family']['eyebrow'] }}</span>
        <h2 class="mx-auto mt-4 max-w-2xl font-display text-4xl font-extrabold leading-[1.08] tracking-tight text-ink text-balance md:text-6xl">
            {{ $c['family']['heading'] }}
        </h2>
        <p class="mx-auto mt-5 max-w-xl text-ink-2 md:text-lg">{{ $c['family']['body'] }}</p>
        <a href="#tempah"
           class="shimmer mt-9 inline-flex items-center justify-center rounded-xl2 bg-brand px-8 py-4 font-semibold text-white shadow-glow transition hover:brightness-110 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
            {{ $c['family']['cta'] }}
        </a>
    </div>
</section>
