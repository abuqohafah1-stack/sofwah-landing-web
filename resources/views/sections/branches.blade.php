{{-- sections/branches.blade.php — REACH · bento (faham dalam 3 saat). Real WhatsApp + Maps. --}}
<section id="cawangan" class="border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-24 md:py-32">
        <x-section-heading
            :eyebrow="$c['branches']['eyebrow']"
            :heading="$c['branches']['heading']"
            :body="$c['branches']['body']" />

        <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($branches as $b)
                <div class="flex flex-col rounded-xl2 border border-white/10 bg-surface p-6">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="font-display text-lg font-semibold text-ink">
                            Sofwah {{ $b['city'] }}@if ($b['area'])<span class="text-ink-3"> · {{ $b['area'] }}</span>@endif
                        </h3>
                        <span class="inline-flex shrink-0 items-center gap-1 rounded-full bg-brand/15 px-2.5 py-1 text-xs font-semibold text-accent">
                            ★ {{ $b['rating'] }} <span class="font-normal text-ink-3">{{ $c['branches']['rating_suffix'] }}</span>
                        </span>
                    </div>
                    <p class="mt-2 text-sm text-ink-2">{{ $c['branches']['highlights'][$b['key']] ?? '' }}</p>

                    <div class="mt-auto flex gap-2 pt-6">
                        <a href="{{ $b['wa'] }}" target="_blank" rel="noopener"
                           class="flex-1 rounded-xl2 bg-brand py-2.5 text-center text-sm font-semibold text-white transition hover:brightness-110 hover:shadow-glow focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
                            {{ $c['branches']['order_label'] }}
                        </a>
                        <a href="{{ $b['maps'] }}" target="_blank" rel="noopener"
                           class="glass rounded-xl2 px-4 py-2.5 text-center text-sm font-semibold text-white transition hover:border-white/20">
                            {{ $c['branches']['navigate_label'] }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
