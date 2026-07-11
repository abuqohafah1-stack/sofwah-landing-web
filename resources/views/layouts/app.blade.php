<!DOCTYPE html>
<html lang="{{ $lang === 'en' ? 'en' : 'ms' }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0B0B0D">

    <title>{{ $c['meta']['title'] }}</title>
    <meta name="description" content="{{ $c['meta']['description'] }}">
    <link rel="canonical" href="{{ $canonical ?? url('/') }}">

    {{-- Preload the hero-critical font weights (protects LCP) --}}
    <link rel="preload" as="font" type="font/woff2" href="/fonts/poppins-700.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="/fonts/poppins-400.woff2" crossorigin>

    {{-- OpenGraph / Twitter (cinematic hero) --}}
    <meta property="og:title" content="{{ $c['meta']['title'] }}">
    <meta property="og:description" content="{{ $c['meta']['description'] }}">
    <meta property="og:type" content="restaurant">
    <meta property="og:image" content="{{ asset('images/hero/cover-home-1920.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="{{ asset('images/brand/logo-sofwah-white-square.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    @if (config('sofwah.ga4'))
        {{-- GA4 — inert until GA4_ID is set in .env --}}
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('sofwah.ga4') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){ dataLayer.push(arguments); }
            gtag('js', new Date());
            gtag('config', @json(config('sofwah.ga4')));
        </script>
    @endif

    {{-- Structured data: Organization + per-branch Restaurant/LocalBusiness + FAQPage --}}
    @isset($schemaJson)
        <script type="application/ld+json">{!! $schemaJson !!}</script>
    @endisset

    @stack('head')
</head>
<body class="min-h-screen bg-bg text-ink antialiased">

    <a href="#main"
       class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-lg focus:bg-brand focus:px-4 focus:py-2 focus:text-white">
        {{ $lang === 'en' ? 'Skip to content' : 'Langkau ke kandungan' }}
    </a>

    {{-- ============ NAV ============ --}}
    <header class="fixed inset-x-0 top-0 z-50 glass border-b border-white/10">
        <div class="mx-auto flex h-[68px] max-w-content items-center gap-5 px-6">
            <a href="/" class="shrink-0" aria-label="Sofwah Arabic Grill">
                <img src="{{ asset('images/brand/logo-sofwah-white-horizontal.png') }}"
                     alt="Sofwah Arabic Grill" class="h-6 w-auto md:h-7">
            </a>

            <nav class="ms-auto hidden items-center gap-7 text-sm text-ink-2 md:flex" aria-label="Utama">
                <a href="{{ url('/') }}#menu" class="transition hover:text-ink">{{ $c['nav']['menu'] }}</a>
                <a href="{{ url('/') }}#cerita" class="transition hover:text-ink">{{ $c['nav']['story'] }}</a>
                <a href="{{ url('/') }}#cawangan" class="transition hover:text-ink">{{ $c['nav']['branches'] }}</a>
                <a href="{{ route('career') }}{{ $lang === 'en' ? '?lang=en' : '' }}" class="transition hover:text-ink">{{ $career['nav_label'] ?? ($lang === 'en' ? 'Careers' : 'Kerjaya') }}</a>
            </nav>

            {{-- EN / BM toggle --}}
            <div class="ms-auto inline-flex overflow-hidden rounded-full border border-white/10 text-xs font-semibold md:ms-0" role="group" aria-label="Bahasa / Language">
                <a href="?lang=bm" hreflang="ms" aria-label="Bahasa Melayu" @if ($lang !== 'en') aria-current="true" @endif class="px-3 py-1.5 {{ $lang !== 'en' ? 'bg-brand text-white' : 'text-ink-3' }}">BM</a>
                <a href="?lang=en" hreflang="en" aria-label="English" @if ($lang === 'en') aria-current="true" @endif class="px-3 py-1.5 {{ $lang === 'en' ? 'bg-brand text-white' : 'text-ink-3' }}">EN</a>
            </div>

            <a href="{{ url('/') }}#cawangan"
               class="hidden rounded-xl2 bg-brand px-5 py-2.5 text-sm font-semibold text-white transition hover:brightness-110 hover:shadow-glow sm:inline-flex">
                {{ $c['nav']['order'] }}
            </a>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    {{-- ============ FOOTER ============ --}}
    <footer class="border-t border-white/10 bg-surface/40">
        <div class="mx-auto max-w-content px-6 py-14">
            <div class="flex flex-col gap-10 md:flex-row md:items-start md:justify-between">
                <div class="max-w-sm">
                    <img src="{{ asset('images/brand/logo-sofwah-white-horizontal.png') }}"
                         alt="Sofwah Arabic Grill" class="h-7 w-auto">
                    <p class="mt-4 text-sm text-ink-2">{{ $c['footer']['tagline'] }}</p>
                    <a href="{{ route('career') }}{{ $lang === 'en' ? '?lang=en' : '' }}"
                       class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-gold transition hover:text-accent">
                        {{ $lang === 'en' ? 'Careers at Sofwah' : 'Kerjaya di Sofwah' }} <span aria-hidden="true">→</span>
                    </a>
                </div>
                <div>
                    <h2 class="text-xs font-semibold uppercase tracking-[0.18em] text-ink-3">
                        {{ $lang === 'en' ? 'Branches — Kedah' : 'Cawangan — Kedah' }}
                    </h2>
                    <ul class="mt-4 grid grid-cols-2 gap-x-10 gap-y-2 text-sm text-ink-2">
                        <li>Gurun</li>
                        <li>Kuala Nerang</li>
                        <li>Sungai Petani</li>
                        <li>Alor Setar — Jalan Pegawai</li>
                        <li>Alor Setar — Aman Central</li>
                        <li>Jitra</li>
                    </ul>
                    <p class="mt-6 text-xs text-ink-3">
                        {{ $lang === 'en' ? 'Full addresses, hours & directions coming in the branch section.' : 'Alamat penuh, waktu operasi & navigasi akan hadir di bahagian cawangan.' }}
                    </p>
                </div>
            </div>
            <p class="mt-12 border-t border-white/5 pt-6 text-xs text-ink-3">
                &copy; {{ $c['footer']['rights'] }}
            </p>
        </div>
    </footer>

    {{-- ============ PERSISTENT MOBILE CTA + BRANCH ORDER SHEET ============ --}}
    <x-order-sheet :branches="$branches" :t="$c['order_sheet']" />

    {{-- Inline scripts (e.g. order-sheet helper) must be defined before Alpine (via Livewire) starts --}}
    @stack('scripts')
    @livewireScripts
</body>
</html>
