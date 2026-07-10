{{-- sections/stats.blade.php — big highlighted count-up numbers (social proof) --}}
<section id="angka" class="warm-glow border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-16 md:py-20">
        <x-section-heading
            :eyebrow="$c['stats_band']['eyebrow']"
            :heading="$c['stats_band']['heading']"
            align="center" />

        <div class="mt-12 grid grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-4" data-reveal-stagger>
            @foreach ($c['stats_band']['items'] as $s)
                @php
                    $isDecimal = str_contains($s['value'], '.');
                    $display   = ($isDecimal ? $s['value'] : number_format((int) $s['value'])) . $s['suffix'];
                @endphp
                <div class="text-center">
                    <div class="stat-num font-display text-4xl font-extrabold leading-none sm:text-5xl md:text-6xl"
                         data-count="{{ $s['value'] }}" data-suffix="{{ $s['suffix'] }}">{{ $display }}</div>
                    <div class="mt-2 text-sm text-ink-3">{{ $s['label'] }}</div>
                </div>
            @endforeach
        </div>

        <p class="mt-10 text-center text-sm text-ink-3">{{ $c['stats_band']['since'] }}</p>
    </div>
</section>
