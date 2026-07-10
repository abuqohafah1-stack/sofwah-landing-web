{{--
  components/hero.blade.php — HERO · story + craving. Warm ambient + animated aurora,
  Mendy in a cursor-tilt 3D food card, count-up stats, shimmer CTA. Content-driven (BM/EN).
--}}
@props([
    'hero'      => [],
    'orderUrl'  => '#cawangan',
    'branchUrl' => '#cawangan',
])
@php
    $h = array_replace_recursive([
        'ornament'      => 'ضِيافة عربية أصيلة',
        'badge'         => 'Restoran Arab #1 di Kedah · Sejak 2018',
        'headline'      => 'Bukan Sekadar Makan. Ini Pengalaman Arab Yang Sebenar.',
        'subline'       => '',
        'cta_primary'   => 'Order Sekarang',
        'cta_secondary' => 'Cari Cawangan Terdekat',
        'image_caption' => 'Nasi Arab Mendy',
        'stats'         => [],
    ], $hero);
@endphp

<section id="hero" class="relative overflow-hidden bg-bg">
    {{-- Warm ambient mesh + drifting aurora (softens the dark, adds life) --}}
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute inset-0" style="background:
            radial-gradient(55% 50% at 12% 18%, rgba(255,154,6,.20), transparent 60%),
            radial-gradient(45% 45% at 88% 12%, rgba(255,218,124,.14), transparent 60%),
            radial-gradient(75% 65% at 82% 88%, rgba(115,13,4,.55), transparent 62%),
            radial-gradient(60% 60% at 8% 96%, rgba(115,13,4,.32), transparent 60%),
            linear-gradient(180deg,#160f0c 0%,#0B0B0D 78%)"></div>
        <span class="aurora" style="width:40vw;height:40vw;left:-10%;top:-12%;background:rgba(255,154,6,.26);animation:auroraDrift 15s ease-in-out infinite"></span>
        <span class="aurora" style="width:36vw;height:36vw;right:-8%;bottom:-14%;background:rgba(115,13,4,.5);animation:auroraDrift 19s ease-in-out infinite reverse"></span>
        <div class="absolute inset-0 opacity-[0.04]" style="background-image:linear-gradient(rgba(255,255,255,.6) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.6) 1px,transparent 1px);background-size:46px 46px"></div>
    </div>

    <div class="relative mx-auto grid max-w-content items-center gap-10 px-6 pb-24 pt-32 md:min-h-screen md:grid-cols-[1.05fr_.95fr] md:gap-12 md:pb-16">

        {{-- Copy --}}
        <div data-hero-el>
            <span class="inline-flex items-center gap-2 rounded-full border border-gold/25 bg-gold/10 px-3.5 py-1.5 text-xs font-semibold text-gold">
                <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-gold"></span>{{ $h['badge'] }}
            </span>

            <p class="mt-5 font-arabic text-xl font-medium text-gold/90 md:text-2xl" dir="rtl">{{ $h['ornament'] }}</p>

            <h1 class="mt-2 font-display text-4xl font-extrabold leading-[1.05] tracking-tight text-ink text-balance sm:text-5xl lg:text-6xl">
                {{ $h['headline'] }}
            </h1>

            <p class="mt-5 max-w-xl text-base text-ink-2 md:text-lg">{{ $h['subline'] }}</p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="{{ $orderUrl }}"
                   class="shimmer inline-flex items-center justify-center gap-2 rounded-xl2 bg-brand px-7 py-4 font-semibold text-white shadow-glow transition duration-300 hover:brightness-110 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
                    <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15l-1.3 4.7 4.8-1.3A10 10 0 1 0 12 2Zm5.5 14.2c-.2.6-1.2 1.2-1.7 1.2-.5.1-1 .1-3.2-.7-2.7-1.1-4.4-3.9-4.5-4-.1-.2-1-1.4-1-2.6s.6-1.8.9-2.1c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .6.5l.8 2c.1.1.1.3 0 .5l-.4.6-.3.3c-.2.1-.3.3-.1.6.2.3.9 1.4 1.9 2.3 1.3 1.1 2.3 1.5 2.6 1.6.3.1.5.1.7-.1l.9-1c.2-.3.4-.2.6-.1l1.9.9c.3.2.5.2.5.4.1.2.1.9-.1 1.4Z"/></svg>
                    {{ $h['cta_primary'] }}
                </a>
                <a href="{{ $branchUrl }}"
                   class="glass inline-flex items-center justify-center rounded-xl2 px-7 py-4 font-semibold text-white transition duration-300 hover:border-white/20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent">
                    {{ $h['cta_secondary'] }}
                </a>
            </div>

            {{-- Stats (count-up) --}}
            @if (!empty($h['stats']))
                <div class="mt-9 flex flex-wrap gap-x-8 gap-y-4">
                    @foreach ($h['stats'] as $s)
                        @php preg_match('/^([\d.,]+)(.*)$/u', $s['value'], $m); $num = isset($m[1]) ? str_replace(',', '', $m[1]) : null; $suf = $m[2] ?? ''; @endphp
                        <div>
                            <div class="stat-num font-display text-3xl font-extrabold md:text-4xl" @if ($num !== null) data-count="{{ $num }}" data-suffix="{{ $suf }}" @endif>{{ $s['value'] }}</div>
                            <div class="text-xs text-ink-3">{{ $s['label'] }}</div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Mini trust --}}
            <div class="mt-8 flex items-center gap-3">
                @foreach (['halal', 'bess', 'sahabat-zakat'] as $b)
                    <span class="flex h-11 w-11 items-center justify-center rounded-full bg-white p-1.5 shadow-md ring-1 ring-black/5">
                        <x-img src="images/trust/{{ $b }}.png" alt="" class="h-full w-full object-contain" />
                    </span>
                @endforeach
                <span class="text-xs text-ink-3">Halal JAKIM · BeSS · Sahabat Zakat</span>
            </div>
        </div>

        {{-- Cursor-tilt 3D food card --}}
        <div class="relative mx-auto w-full max-w-md [perspective:1400px]" data-hero-el data-tilt>
            <div class="relative animate-[heroFloat_6s_ease-in-out_infinite]" data-float>
                <div class="relative overflow-hidden rounded-xl3 border border-white/12 shadow-[0_40px_80px_-20px_rgba(0,0,0,.7)] [transform-style:preserve-3d]" data-tilt-inner>
                    <x-img src="images/menu-ai/mendy-mix.jpg"
                           alt="Nasi Arab Mendy Sofwah — nasi Arab beraroma dengan kambing dan ayam panggang, berasap"
                           class="aspect-[4/5] w-full object-cover" fetchpriority="high" loading="eager" width="1200" height="1500" />
                    <div class="pointer-events-none absolute inset-0" style="background:linear-gradient(180deg,transparent 55%,rgba(11,11,13,.55) 100%)"></div>
                    <span class="absolute bottom-4 left-4 font-arabic text-sm text-gold" dir="rtl">مندي</span>
                    <span class="absolute bottom-4 right-4 text-xs font-medium text-ink-2">{{ $h['image_caption'] }}</span>
                </div>

                <div class="glass absolute -left-4 top-6 flex items-center gap-2 rounded-2xl px-4 py-2.5 shadow-xl">
                    <span class="text-lg text-accent">★</span>
                    <div>
                        <div class="text-sm font-bold text-ink">4.9<span class="text-ink-3">/5</span></div>
                        <div class="text-[10px] text-ink-3">8,973 review</div>
                    </div>
                </div>
                <div class="glass absolute -right-3 bottom-10 flex items-center gap-1.5 rounded-full px-3 py-1.5 shadow-xl">
                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-accent"></span>
                    <span class="text-[11px] font-semibold text-ink">Panas &amp; Segar</span>
                </div>
            </div>
        </div>
    </div>

    <span class="pointer-events-none absolute inset-x-0 bottom-4 z-10 mx-auto flex h-9 w-5 justify-center rounded-full border border-white/20" aria-hidden="true">
        <span class="mt-1.5 block h-2 w-0.5 rounded bg-white/45" data-hero-scrollcue></span>
    </span>
</section>
