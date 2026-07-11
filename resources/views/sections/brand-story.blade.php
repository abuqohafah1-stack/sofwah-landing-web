{{-- sections/brand-story.blade.php — emotional connection (Caregiver + Ruler voice) --}}
<section id="cerita" class="warm-glow border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-24 md:py-32">
        <div class="grid gap-12 md:grid-cols-2 md:items-center md:gap-16">
            {{-- Image with gradient frame + floating proof badge --}}
            <div class="relative" data-reveal>
                <div class="ring-hover overflow-hidden rounded-xl3 border border-white/10 shadow-[0_40px_80px_-24px_rgba(0,0,0,.7)]">
                    <x-img src="images/gallery/ambience-counter.jpg"
                           alt="Kaunter Sofwah dengan teko Arab (dallah) keemasan dan hospitaliti yang hangat"
                           class="aspect-[4/5] w-full object-cover" />
                </div>
                <div class="glass absolute -bottom-5 -right-3 rounded-2xl px-5 py-3 shadow-xl sm:-right-5">
                    <div class="stat-num font-display text-2xl font-extrabold" data-count="8973" data-suffix="+">8,973+</div>
                    <div class="text-[11px] text-ink-3">review · sejak 2018</div>
                </div>
            </div>

            {{-- Story --}}
            <div data-reveal>
                <span class="text-xs font-semibold uppercase tracking-[0.22em] text-accent">{{ $c['story']['eyebrow'] }}</span>
                <h2 class="mt-3 font-display text-3xl font-bold leading-[1.12] tracking-tight text-ink text-balance md:text-5xl">
                    {{ $c['story']['heading'] }}
                </h2>
                <p class="mt-5 text-ink-2">{{ $c['story']['body_1'] }}</p>

                <blockquote class="my-6 border-l-2 border-gold pl-5 font-display text-lg font-medium italic text-gold/90">
                    “Kami tak jual makanan. Kami hidangkan moment.”
                </blockquote>

                <p class="text-ink-2">{{ $c['story']['body_2'] }}</p>
            </div>
        </div>
    </div>
</section>
