{{-- sections/wall-of-love.blade.php — REVIEW / Trust. Real Google ratings + accolade. --}}
<section id="reviews" class="warm-glow border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-24 md:py-32">
        @php $totalReviews = collect($branches)->sum('reviews'); @endphp
        <div class="grid gap-8 md:grid-cols-[1.3fr_1fr] md:items-end">
            <x-section-heading
                :eyebrow="$c['reviews']['eyebrow']"
                :heading="$c['reviews']['heading']"
                :body="$c['reviews']['body']" />

            <div class="md:text-right">
                <div class="flex items-baseline gap-1 md:justify-end">
                    <span class="stat-num font-display text-6xl font-extrabold" data-count="{{ $c['reviews']['avg'] }}" data-suffix="★">{{ $c['reviews']['avg'] }}★</span>
                </div>
                <p class="mt-1 text-xs text-ink-3">{{ $c['reviews']['avg_label'] }} · <span class="stat-num font-bold" data-count="{{ $totalReviews }}" data-suffix="+">{{ number_format($totalReviews) }}+</span> review · {{ $c['reviews']['branches_label'] }}</p>
            </div>
        </div>

        <p class="mt-6 font-display text-lg italic text-gold/90">{{ $c['reviews']['accolade'] }}</p>

        {{-- Real per-branch Google ratings (each links to that branch's Google page) --}}
        <div class="mt-6 flex flex-wrap gap-2">
            @foreach ($branches as $b)
                <a href="{{ $b['maps'] }}" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-surface px-3 py-1.5 text-xs text-ink-2 transition hover:border-white/25">
                    Sofwah {{ $b['city'] }}@if ($b['area']) <span class="text-ink-3">({{ $b['area'] }})</span>@endif
                    <span class="font-semibold text-accent">★ {{ $b['rating'] }}</span>@if ($b['reviews'])<span class="text-ink-3">· {{ number_format($b['reviews']) }}</span>@endif
                </a>
            @endforeach
        </div>

        {{-- Filterable review wall (Livewire: filter by branch + rating) --}}
        <div class="mt-10">
            <livewire:review-wall :lang="$lang" />
        </div>
        <p class="mt-4 text-xs text-ink-3">{{ $c['reviews']['samples_note'] }}</p>

        {{-- Social handles --}}
        <div class="mt-12 flex flex-col items-center gap-5 rounded-xl3 border border-white/10 bg-surface/60 p-8 text-center sm:flex-row sm:justify-between sm:text-left" data-reveal>
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.2em] text-accent">{{ $c['social']['eyebrow'] }}</span>
                <h3 class="mt-1 font-display text-xl font-semibold text-ink">{{ $c['social']['heading'] }}</h3>
                <p class="mt-1 text-sm text-ink-2">{!! $c['social']['body'] !!} <span class="font-semibold text-gold">{{ $c['social']['handle'] }}</span></p>
            </div>
            <div class="flex flex-wrap justify-center gap-2">
                @foreach ($c['social']['links'] as $l)
                    <a href="{{ $l['url'] }}" target="_blank" rel="noopener"
                       class="glass rounded-xl2 px-5 py-2.5 text-sm font-semibold text-white transition hover:border-white/25">{{ $l['label'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>
