{{-- sections/faq.blade.php — Confidence · native <details> accordion (no JS). Feeds FAQPage schema (Phase 5). --}}
<section id="faq" class="warm-glow border-t border-white/5">
    <div class="mx-auto max-w-3xl px-6 py-24 md:py-32">
        <x-section-heading
            :eyebrow="$c['faq']['eyebrow']"
            :heading="$c['faq']['heading']"
            align="center" />

        <div class="mt-12 divide-y divide-white/10 overflow-hidden rounded-xl2 border border-white/10 bg-surface">
            @foreach ($c['faq']['items'] as $item)
                <details class="group">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 px-6 py-5 font-medium text-ink marker:hidden focus-visible:outline focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-accent">
                        <span>{{ $item['q'] }}</span>
                        <svg class="h-5 w-5 shrink-0 text-accent transition-transform duration-300 group-open:rotate-45"
                             viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M10 4v12M4 10h12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </summary>
                    <div class="px-6 pb-5 text-sm text-ink-2">{{ $item['a'] }}</div>
                </details>
            @endforeach
        </div>
    </div>
</section>
