{{-- sections/trust.blade.php — Trust Stack · official certifications + amenities (premium) --}}
@php $verified = $lang === 'en' ? 'Verified' : 'Disahkan'; @endphp

<section id="trust" class="warm-glow relative overflow-hidden border-t border-white/5">
    {{-- ambient glow --}}
    <div class="pointer-events-none absolute inset-x-0 top-1/2 h-64 -translate-y-1/2" aria-hidden="true"
         style="background:radial-gradient(60% 100% at 50% 50%, rgba(255,154,6,.10), transparent 70%)"></div>

    <div class="relative mx-auto max-w-content px-6 py-20 md:py-24">
        <x-section-heading
            :eyebrow="$c['trust_stack']['eyebrow']"
            :heading="$c['trust_stack']['heading']"
            :body="$c['trust_stack']['body']"
            align="center" />

        {{-- Official certification badges --}}
        <div class="mt-14 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5" data-reveal-stagger>
            @foreach ($c['trust_stack']['badges'] as $b)
                <div class="group relative flex flex-col items-center gap-4 overflow-hidden rounded-xl3 border border-white/10 bg-gradient-to-b from-white/[0.06] to-transparent p-6 text-center transition-all duration-300 hover:-translate-y-2 hover:border-gold/40 hover:shadow-[0_26px_60px_-24px_rgba(255,154,6,.35)]">
                    {{-- hover glow --}}
                    <span class="pointer-events-none absolute -top-8 left-1/2 h-20 w-20 -translate-x-1/2 rounded-full bg-accent/30 opacity-0 blur-2xl transition duration-300 group-hover:opacity-100" aria-hidden="true"></span>

                    <span class="relative flex h-24 w-24 items-center justify-center rounded-2xl bg-white p-3.5 shadow-xl ring-1 ring-black/5 transition duration-500 group-hover:scale-105">
                        <x-img src="images/trust/{{ $b['img'] }}.png" alt="{{ $b['label'] }}" class="h-full w-full object-contain" />
                    </span>

                    <div class="relative">
                        <div class="text-xs font-semibold leading-snug text-ink-2">{{ $b['label'] }}</div>
                        <div class="mt-1.5 inline-flex items-center gap-1 text-[10px] font-semibold uppercase tracking-wider text-accent">
                            <svg viewBox="0 0 20 20" class="h-3 w-3" fill="none" aria-hidden="true"><path d="M4 10.5l3.5 3.5L16 5.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            {{ $verified }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Amenities --}}
        <div class="mt-10 flex flex-wrap justify-center gap-2.5" data-reveal-stagger>
            @foreach ($c['trust_stack']['amenities'] as $a)
                <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-surface px-4 py-2 text-sm text-ink-2 transition hover:border-gold/30 hover:text-ink">
                    <svg viewBox="0 0 20 20" class="h-4 w-4 text-accent" fill="none" aria-hidden="true"><path d="M4 10.5l3.5 3.5L16 5.5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    {{ $a }}
                </span>
            @endforeach
        </div>
    </div>
</section>
