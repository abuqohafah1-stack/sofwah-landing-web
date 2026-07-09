{{--
  components/hero.blade.php — HERO EXPERIENCE · REALIZE (Curiosity → Craving)
  Content-driven (BM/EN). Motion lives in resources/js/app.js (Vite-bundled GSAP),
  guarded by prefers-reduced-motion. Production hero = Cover Home Page (Brand Library).
--}}
@props([
    'hero'      => [],
    'image'     => 'images/hero/cover-home-1920.jpg',
    'orderUrl'  => '#order',
    'branchUrl' => '#cawangan',
])
@php
    $h = array_replace_recursive([
        'ornament'      => 'ضِيافة عربية',
        'headline'      => 'Bukan sekadar tempat makan. Tempat untuk orang yang kita sayang.',
        'subline'       => '',
        'cta_primary'   => 'Order Sekarang',
        'cta_secondary' => 'Cari Cawangan Terdekat',
        'trust'         => ['rating' => '4.8', 'rating_label' => 'rating Google', 'branches' => '6 cawangan', 'customers' => 'Ribuan keluarga setia'],
    ], $hero);
@endphp

<section id="hero" class="relative flex min-h-[100svh] flex-col justify-end overflow-hidden bg-bg"
         aria-label="Sofwah Arabic Grill">
    <div class="absolute inset-0" data-hero-media>
        <x-img :src="$image"
               alt="Ruang makan Sofwah Arabic Grill — suasana hangat, dinding jubin Moroccan dan tempat duduk keluarga"
               class="h-full w-full object-cover" style="object-position:50% 42%"
               fetchpriority="high" loading="eager" width="1920" height="2560" />
        <div class="absolute inset-0" aria-hidden="true" style="background:
            radial-gradient(120% 80% at 78% 12%, rgba(255,154,6,.18), transparent 55%),
            radial-gradient(90% 72% at 16% 94%, rgba(115,13,4,.50), transparent 60%),
            linear-gradient(180deg, rgba(11,11,13,.42) 0%, rgba(11,11,13,.70) 55%, #0B0B0D 100%)"></div>
    </div>

    <div class="relative z-10 mx-auto w-full max-w-content px-6 pb-20 pt-28 md:pb-28">
        <p class="mb-4 font-arabic text-lg font-medium text-gold md:text-xl" dir="rtl" data-hero-el>{{ $h['ornament'] }}</p>

        <h1 class="max-w-[16ch] font-display text-4xl font-extrabold leading-[1.06] tracking-tight text-ink text-balance sm:text-5xl md:text-6xl lg:text-7xl"
            data-hero-el>{{ $h['headline'] }}</h1>

        <p class="mt-5 max-w-[44ch] text-base text-ink-2 md:text-lg" data-hero-el>{{ $h['subline'] }}</p>

        <div class="mt-8 flex flex-col gap-3 sm:flex-row" data-hero-el>
            <a href="{{ $orderUrl }}"
               class="inline-flex items-center justify-center rounded-xl2 bg-brand px-7 py-4 font-semibold text-white transition duration-300 hover:brightness-110 hover:shadow-glow focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
                {{ $h['cta_primary'] }}
            </a>
            <a href="{{ $branchUrl }}"
               class="glass inline-flex items-center justify-center rounded-xl2 px-7 py-4 font-semibold text-white transition duration-300 hover:border-white/20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
                {{ $h['cta_secondary'] }}
            </a>
        </div>

        <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-2 text-sm text-ink-3" data-hero-el>
            <span class="inline-flex items-center gap-1.5"><span class="text-accent">★</span> {{ $h['trust']['rating'] }} {{ $h['trust']['rating_label'] }}</span>
            <span aria-hidden="true" class="text-white/15">•</span>
            <span>{{ $h['trust']['branches'] }}</span>
            <span aria-hidden="true" class="text-white/15">•</span>
            <span>{{ $h['trust']['customers'] }}</span>
        </div>
    </div>

    <span class="pointer-events-none absolute inset-x-0 bottom-5 z-10 mx-auto flex h-9 w-5 justify-center rounded-full border border-white/25" aria-hidden="true">
        <span class="mt-1.5 block h-2 w-0.5 rounded bg-white/50" data-hero-scrollcue></span>
    </span>
</section>
