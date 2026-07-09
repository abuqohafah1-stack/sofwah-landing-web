{{-- sections/signature-menu.blade.php — Craving. Mendy featured + photo grid (all dishes have real images). --}}
@php
    $dishes   = $c['menu']['dishes'];
    $featured = array_slice($dishes, 0, 2);   // Nasi Arab Mendy + Arabic Grill Platter
    $rest     = array_slice($dishes, 2);
@endphp

<section id="menu" class="warm-glow border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-24 md:py-32">
        <x-section-heading
            :eyebrow="$c['menu']['eyebrow']"
            :heading="$c['menu']['heading']"
            :body="$c['menu']['body']" />

        {{-- Featured hero dishes --}}
        <div class="mt-14 space-y-16 md:mt-16 md:space-y-24">
            @foreach ($featured as $i => $dish)
                <x-dish-story :dish="$dish" :labels="$c['menu']['labels']" :reversed="$i % 2 === 1" />
            @endforeach
        </div>

        {{-- Photo grid — the rest --}}
        <h3 class="mt-20 text-xs font-semibold uppercase tracking-[0.2em] text-ink-3">{{ $c['menu']['more_label'] }}</h3>
        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($rest as $dish)
                <a href="#cawangan" class="group relative overflow-hidden rounded-xl2 border border-white/10">
                    <x-img :src="$dish['image']" :alt="$dish['name']"
                           class="aspect-[4/5] w-full object-cover transition duration-700 group-hover:scale-[1.06]" />
                    <div class="absolute inset-0" style="background:linear-gradient(180deg,transparent 40%,rgba(11,11,13,.85) 100%)"></div>
                    @if (!empty($dish['badge']))
                        <span class="absolute left-3 top-3 rounded-full bg-gold px-2.5 py-0.5 text-[11px] font-bold text-bg">{{ $dish['badge'] }}</span>
                    @endif
                    <div class="absolute inset-x-0 bottom-0 p-4">
                        <span class="font-arabic text-sm text-gold" dir="rtl">{{ $dish['arabic'] }}</span>
                        <h4 class="mt-0.5 font-display text-base font-semibold text-ink">{{ $dish['name'] }}</h4>
                        <p class="mt-1 text-xs leading-snug text-ink-2 opacity-0 transition duration-300 group-hover:opacity-100">{{ $dish['apa'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
