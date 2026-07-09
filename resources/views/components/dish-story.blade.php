{{--
  components/dish-story.blade.php — Signature Menu storytelling block (NOT a menu card).
  Outcome-led: apa dia · kenapa istimewa · kenapa pelanggan suka · emosi yang dicipta.
--}}
@props([
    'dish'     => [],
    'labels'   => [],
    'reversed' => false,
])

<article class="grid items-center gap-8 md:grid-cols-2 md:gap-12">
    <div class="{{ $reversed ? 'md:order-2' : '' }}">
        <div class="group relative overflow-hidden rounded-xl3 border border-white/10">
            <x-img :src="$dish['image']" :alt="$dish['name']"
                   class="aspect-[4/3] w-full object-cover transition duration-700 will-change-transform group-hover:scale-[1.04]" />
            <div class="pointer-events-none absolute inset-0" style="background:linear-gradient(180deg,transparent 55%,rgba(11,11,13,.45) 100%)"></div>
            @if (!empty($dish['badge']))
                <span class="absolute left-4 top-4 rounded-full bg-gold px-3 py-1 text-xs font-bold text-bg shadow">{{ $dish['badge'] }}</span>
            @endif
        </div>
    </div>

    <div class="{{ $reversed ? 'md:order-1' : '' }}">
        <p class="font-arabic text-2xl font-bold text-gold" dir="rtl">{{ $dish['arabic'] }}</p>
        <h3 class="mt-1 font-display text-2xl font-bold text-ink md:text-3xl">{{ $dish['name'] }}</h3>
        <p class="mt-3 text-ink-2">{{ $dish['apa'] }}</p>

        <dl class="mt-5 space-y-3.5">
            <div class="border-l-2 border-brand pl-4">
                <dt class="text-xs font-semibold uppercase tracking-[0.14em] text-accent">{{ $labels['istimewa'] ?? '' }}</dt>
                <dd class="mt-0.5 text-sm text-ink-2">{{ $dish['istimewa'] }}</dd>
            </div>
            <div class="border-l-2 border-brand pl-4">
                <dt class="text-xs font-semibold uppercase tracking-[0.14em] text-accent">{{ $labels['suka'] ?? '' }}</dt>
                <dd class="mt-0.5 text-sm text-ink-2">{{ $dish['suka'] }}</dd>
            </div>
            <div class="border-l-2 border-brand pl-4">
                <dt class="text-xs font-semibold uppercase tracking-[0.14em] text-accent">{{ $labels['emosi'] ?? '' }}</dt>
                <dd class="mt-0.5 text-sm text-ink-2">{{ $dish['emosi'] }}</dd>
            </div>
        </dl>

        <a href="#cawangan"
           class="mt-6 inline-flex items-center justify-center rounded-xl2 bg-brand px-6 py-3 text-sm font-semibold text-white transition hover:brightness-110 hover:shadow-glow focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
            {{ $labels['order'] ?? 'Order' }}
        </a>
    </div>
</article>
