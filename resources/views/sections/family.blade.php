{{-- sections/family.blade.php — emotion over transaction · "Tempat memori tercipta" --}}
<section id="family" class="relative overflow-hidden border-t border-white/5">
    <div class="absolute inset-0" aria-hidden="true" style="background:
        radial-gradient(90% 70% at 50% 0%, rgba(115,13,4,.35), transparent 60%),
        radial-gradient(70% 60% at 50% 120%, rgba(255,154,6,.12), transparent 60%)"></div>

    <div class="relative mx-auto max-w-content px-6 py-28 text-center md:py-36">
        <span class="text-xs font-semibold uppercase tracking-[0.22em] text-accent">{{ $c['family']['eyebrow'] }}</span>
        <h2 class="mx-auto mt-3 max-w-2xl font-display text-3xl font-bold leading-[1.12] tracking-tight text-ink text-balance md:text-5xl">
            {{ $c['family']['heading'] }}
        </h2>
        <p class="mx-auto mt-5 max-w-xl text-ink-2 md:text-lg">{{ $c['family']['body'] }}</p>
        <a href="#tempah"
           class="mt-8 inline-flex items-center justify-center rounded-xl2 bg-brand px-7 py-4 font-semibold text-white transition hover:brightness-110 hover:shadow-glow focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
            {{ $c['family']['cta'] }}
        </a>
    </div>
</section>
