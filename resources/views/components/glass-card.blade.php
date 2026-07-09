{{-- components/glass-card.blade.php — Brand DNA glass surface --}}
@props(['title' => null])

<div {{ $attributes->merge(['class' => 'glass rounded-xl2 p-6']) }}>
    @isset($title)
        <h3 class="font-display text-lg font-semibold text-ink">{{ $title }}</h3>
    @endisset
    <div class="{{ isset($title) ? 'mt-2' : '' }} text-sm text-ink-2">
        {{ $slot }}
    </div>
</div>
