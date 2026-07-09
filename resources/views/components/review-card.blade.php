{{-- components/review-card.blade.php — Wall of Love card (Google-review style) --}}
@props(['review' => []])

<figure class="flex h-full flex-col rounded-xl2 border border-white/10 bg-surface p-6">
    <div class="flex items-center gap-0.5 text-accent" aria-label="{{ $review['rating'] }}/5">
        @for ($i = 0; $i < 5; $i++)
            <span aria-hidden="true">{{ $i < $review['rating'] ? '★' : '☆' }}</span>
        @endfor
    </div>
    <blockquote class="mt-3 flex-1 text-sm text-ink-2">“{{ $review['text'] }}”</blockquote>
    <figcaption class="mt-4 flex items-center gap-2 text-xs text-ink-3">
        <span class="flex h-7 w-7 items-center justify-center rounded-full bg-brand/20 text-[11px] font-bold text-accent" aria-hidden="true">G</span>
        <span>{{ $review['name'] }} · {{ $review['branch'] }}</span>
    </figcaption>
</figure>
