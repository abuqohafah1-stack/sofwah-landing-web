{{-- components/section-heading.blade.php — reusable eyebrow + H2 + intro --}}
@props([
    'eyebrow' => null,
    'heading' => '',
    'body'    => null,
    'align'   => 'start', // start | center
])

<div class="{{ $align === 'center' ? 'mx-auto max-w-2xl text-center' : 'max-w-2xl' }}">
    @if ($eyebrow)
        <span class="text-xs font-semibold uppercase tracking-[0.22em] text-accent">{{ $eyebrow }}</span>
    @endif
    <h2 class="mt-3 font-display text-3xl font-bold leading-[1.12] tracking-tight text-ink text-balance md:text-5xl">
        {{ $heading }}
    </h2>
    @if ($body)
        <p class="mt-4 text-base text-ink-2 md:text-lg">{{ $body }}</p>
    @endif
</div>
