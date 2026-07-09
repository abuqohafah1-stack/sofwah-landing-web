{{-- sections/signature-menu.blade.php — Craving · storytelling per hero dish --}}
@php
    $featured = array_values(array_filter($c['menu']['dishes'], fn ($d) => !empty($d['image'])));
    $more     = array_values(array_filter($c['menu']['dishes'], fn ($d) => empty($d['image'])));
@endphp

<section id="menu" class="border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-24 md:py-32">
        <x-section-heading
            :eyebrow="$c['menu']['eyebrow']"
            :heading="$c['menu']['heading']"
            :body="$c['menu']['body']" />

        {{-- Featured hero dishes with photography --}}
        <div class="mt-14 space-y-16 md:mt-16 md:space-y-24">
            @foreach ($featured as $i => $dish)
                <x-dish-story :dish="$dish" :labels="$c['menu']['labels']" :reversed="$i % 2 === 1" />
            @endforeach
        </div>

        {{-- More signature dishes --}}
        @if (count($more))
            <div class="mt-20">
                <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-ink-3">{{ $c['menu']['more_label'] }}</h3>
                <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($more as $dish)
                        <div class="flex flex-col rounded-xl2 border border-white/10 bg-surface p-6">
                            <div class="flex items-start justify-between gap-2">
                                <span class="font-arabic text-xl font-bold text-gold" dir="rtl">{{ $dish['arabic'] }}</span>
                                @if (!empty($dish['badge']))
                                    <span class="shrink-0 rounded-full bg-brand px-2.5 py-0.5 text-[11px] font-bold text-white">{{ $dish['badge'] }}</span>
                                @endif
                            </div>
                            <h4 class="mt-3 font-display text-lg font-semibold text-ink">{{ $dish['name'] }}</h4>
                            <p class="mt-1.5 text-sm text-ink-2">{{ $dish['apa'] }}</p>
                            <p class="mt-3 text-xs text-ink-3">{{ $dish['emosi'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
