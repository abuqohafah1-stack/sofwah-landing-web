{{-- sections/final-cta.blade.php — Action · full-bleed cinematic close --}}
<section class="relative overflow-hidden border-t border-white/5">
    <div class="absolute inset-0" aria-hidden="true" data-parallax>
        <x-img src="images/menu-ai/mendy-mix.jpg" alt="" class="h-[115%] w-full object-cover" style="object-position:center 28%" />
        <div class="absolute inset-0" style="background:
            radial-gradient(70% 60% at 50% 0%, rgba(115,13,4,.55), transparent 62%),
            radial-gradient(50% 50% at 50% 110%, rgba(255,154,6,.18), transparent 60%),
            linear-gradient(180deg, rgba(11,11,13,.80) 0%, rgba(11,11,13,.66) 45%, rgba(11,11,13,.92) 100%)"></div>
    </div>

    <div class="relative mx-auto max-w-content px-6 py-36 text-center md:py-48" data-reveal>
        <span class="text-xs font-semibold uppercase tracking-[0.22em] text-accent">{{ $c['final']['eyebrow'] }}</span>
        <h2 class="mx-auto mt-4 max-w-3xl font-display text-4xl font-extrabold leading-[1.06] tracking-tight text-ink text-balance md:text-6xl">
            {{ $c['final']['heading'] }}
        </h2>
        <p class="mx-auto mt-5 max-w-xl text-ink-2 md:text-lg">{{ $c['final']['body'] }}</p>

        <div class="mt-9 flex flex-col justify-center gap-3 sm:flex-row">
            <a href="#cawangan"
               class="shimmer inline-flex items-center justify-center rounded-xl2 bg-brand px-8 py-4 font-semibold text-white shadow-glow transition hover:brightness-110 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
                {{ $c['final']['cta_order'] }}
            </a>
            <a href="#cawangan"
               class="glass inline-flex items-center justify-center rounded-xl2 px-8 py-4 font-semibold text-white transition hover:border-white/25 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
                {{ $c['final']['cta_branch'] }}
            </a>
        </div>
    </div>
</section>
