{{-- sections/final-cta.blade.php — Action · strong close --}}
<section class="relative overflow-hidden border-t border-white/5">
    <div class="absolute inset-0" aria-hidden="true" style="background:
        radial-gradient(80% 70% at 50% 0%, rgba(115,13,4,.40), transparent 62%),
        radial-gradient(60% 60% at 50% 120%, rgba(255,154,6,.14), transparent 60%)"></div>

    <div class="relative mx-auto max-w-content px-6 py-28 text-center md:py-36">
        <span class="text-xs font-semibold uppercase tracking-[0.22em] text-accent">{{ $c['final']['eyebrow'] }}</span>
        <h2 class="mx-auto mt-3 max-w-3xl font-display text-3xl font-bold leading-[1.12] tracking-tight text-ink text-balance md:text-5xl">
            {{ $c['final']['heading'] }}
        </h2>
        <p class="mx-auto mt-4 max-w-xl text-ink-2 md:text-lg">{{ $c['final']['body'] }}</p>

        <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
            <a href="#cawangan"
               class="inline-flex items-center justify-center rounded-xl2 bg-brand px-7 py-4 font-semibold text-white transition hover:brightness-110 hover:shadow-glow focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
                {{ $c['final']['cta_order'] }}
            </a>
            <a href="#cawangan"
               class="glass inline-flex items-center justify-center rounded-xl2 px-7 py-4 font-semibold text-white transition hover:border-white/20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
                {{ $c['final']['cta_branch'] }}
            </a>
        </div>
    </div>
</section>
