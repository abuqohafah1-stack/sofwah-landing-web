{{-- components/review-card.blade.php — attractive Google-review card --}}
@props(['review' => []])
@php
    $name    = $review['name'] ?? 'Google';
    $branch  = $review['branch'] ?? '';
    $rating  = (int) ($review['rating'] ?? 5);
    $initial = mb_strtoupper(mb_substr(trim(preg_replace('/^Sofwah\s+/i', '', $branch)) ?: $name, 0, 1));
    $palettes = [['#730D04', '#FF9A06'], ['#FF9A06', '#FFDA7C'], ['#8a1a0a', '#FFDA7C'], ['#b3520a', '#FF9A06']];
    $p = $palettes[abs(crc32($branch . $name)) % count($palettes)];
@endphp

<figure class="glow-card ring-hover flex h-full flex-col rounded-xl3 border border-white/10 bg-gradient-to-b from-surface to-[#101012] p-6">
    <div class="flex items-start justify-between">
        <div class="flex gap-0.5 text-lg text-accent" aria-label="{{ $rating }}/5">
            @for ($i = 0; $i < 5; $i++)<span aria-hidden="true">{{ $i < $rating ? '★' : '☆' }}</span>@endfor
        </div>
        {{-- Google G --}}
        <svg class="h-6 w-6 shrink-0" viewBox="0 0 24 24" aria-hidden="true">
            <path fill="#4285F4" d="M22.5 12.2c0-.7-.1-1.4-.2-2H12v3.9h5.9a5 5 0 0 1-2.2 3.3v2.7h3.6c2.1-2 3.2-4.8 3.2-7.9Z"/>
            <path fill="#34A853" d="M12 23c2.9 0 5.4-1 7.2-2.7l-3.6-2.7c-1 .7-2.3 1.1-3.6 1.1-2.8 0-5.1-1.9-6-4.4H2.3v2.8A11 11 0 0 0 12 23Z"/>
            <path fill="#FBBC05" d="M6 14.3a6.6 6.6 0 0 1 0-4.2V7.3H2.3a11 11 0 0 0 0 9.8L6 14.3Z"/>
            <path fill="#EA4335" d="M12 5.5c1.6 0 3 .5 4.1 1.6l3.1-3.1A11 11 0 0 0 2.3 7.3L6 10.1c.9-2.5 3.2-4.6 6-4.6Z"/>
        </svg>
    </div>

    <blockquote class="mt-4 flex-1 text-[15px] leading-relaxed text-ink-2">“{{ $review['text'] }}”</blockquote>

    <figcaption class="mt-5 flex items-center gap-3">
        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-sm font-bold text-white shadow-lg"
              style="background:linear-gradient(135deg,{{ $p[0] }},{{ $p[1] }})">{{ $initial }}</span>
        <div class="leading-tight">
            <div class="text-sm font-semibold text-ink">{{ $name }}</div>
            <div class="text-xs text-ink-3">{{ $branch }} · <span class="text-accent">Ulasan Google</span></div>
        </div>
    </figcaption>
</figure>
