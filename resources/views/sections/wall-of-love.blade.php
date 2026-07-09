{{-- sections/wall-of-love.blade.php — REVIEW / Trust. Real Google ratings + accolade. --}}
<section id="reviews" class="border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-24 md:py-32">
        @php $totalReviews = collect($branches)->sum('reviews'); @endphp
        <div class="grid gap-8 md:grid-cols-[1.3fr_1fr] md:items-end">
            <x-section-heading
                :eyebrow="$c['reviews']['eyebrow']"
                :heading="$c['reviews']['heading']"
                :body="$c['reviews']['body']" />

            <div class="md:text-right">
                <div class="flex items-baseline gap-2 md:justify-end">
                    <span class="font-display text-5xl font-extrabold text-gold">{{ $c['reviews']['avg'] }}</span>
                    <span class="text-2xl text-accent">★</span>
                </div>
                <p class="mt-1 text-xs text-ink-3">{{ $c['reviews']['avg_label'] }} · {{ number_format($totalReviews) }}+ review · {{ $c['reviews']['branches_label'] }}</p>
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
    </div>
</section>
