{{-- sections/brand-story.blade.php — emotional connection (Caregiver + Ruler voice) --}}
<section id="cerita" class="border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-24 md:py-32">
        <div class="grid gap-10 md:grid-cols-2 md:items-center md:gap-16">
            <div class="overflow-hidden rounded-xl3 border border-white/10">
                <x-img src="images/gallery/ambience-counter.jpg"
                       alt="Kaunter Sofwah dengan teko Arab (dallah) keemasan dan hospitaliti yang hangat"
                       class="aspect-[4/5] w-full object-cover" />
            </div>
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.22em] text-accent">{{ $c['story']['eyebrow'] }}</span>
                <h2 class="mt-3 font-display text-3xl font-bold leading-[1.12] tracking-tight text-ink text-balance md:text-5xl">
                    {{ $c['story']['heading'] }}
                </h2>
                <p class="mt-5 text-ink-2">{{ $c['story']['body_1'] }}</p>
                <p class="mt-4 text-ink-2">{{ $c['story']['body_2'] }}</p>
            </div>
        </div>
    </div>
</section>
