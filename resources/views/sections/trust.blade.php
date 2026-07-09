{{-- sections/trust.blade.php — Trust Stack · official certifications + amenities --}}
<section id="trust" class="warm-glow border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-20 md:py-24">
        <x-section-heading
            :eyebrow="$c['trust_stack']['eyebrow']"
            :heading="$c['trust_stack']['heading']"
            :body="$c['trust_stack']['body']"
            align="center" />

        {{-- Official certification badges --}}
        <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
            @foreach ($c['trust_stack']['badges'] as $b)
                <div class="flex flex-col items-center gap-3 rounded-xl2 border border-white/10 bg-surface p-5 text-center transition duration-300 hover:-translate-y-1 hover:border-white/25">
                    <span class="flex h-20 w-20 items-center justify-center rounded-2xl bg-white p-3 shadow-lg ring-1 ring-black/5">
                        <x-img src="images/trust/{{ $b['img'] }}.png" alt="{{ $b['label'] }}" class="h-full w-full object-contain" />
                    </span>
                    <span class="text-xs font-medium leading-snug text-ink-2">{{ $b['label'] }}</span>
                </div>
            @endforeach
        </div>

        {{-- Amenities --}}
        <div class="mt-8 flex flex-wrap justify-center gap-2.5">
            @foreach ($c['trust_stack']['amenities'] as $a)
                <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-surface px-4 py-2 text-sm text-ink-2">
                    <svg viewBox="0 0 20 20" class="h-4 w-4 text-accent" fill="none" aria-hidden="true"><path d="M4 10.5l3.5 3.5L16 5.5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    {{ $a }}
                </span>
            @endforeach
        </div>
    </div>
</section>
