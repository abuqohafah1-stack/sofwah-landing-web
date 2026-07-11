@extends('layouts.app')

@php
    $waBase = 'https://wa.me/' . $career['apply']['wa_number'] . '?text=';
    $applyGeneral = $waBase . rawurlencode($career['apply']['wa_text']);
    $initials = fn ($name) => collect(explode(' ', $name))->take(2)->map(fn ($w) => mb_substr($w, 0, 1))->implode('');
    $avatarGrad = ['linear-gradient(135deg,#730D04,#FF9A06)', 'linear-gradient(135deg,#FF9A06,#FFDA7C)', 'linear-gradient(135deg,#8a1a0a,#FFDA7C)', 'linear-gradient(135deg,#b3520a,#FF9A06)'];
    $tier1 = collect($org['leadership'])->where('tier', 1)->values();
    $tier2 = collect($org['leadership'])->where('tier', 2)->values();
@endphp

@section('content')

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-bg">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <div class="absolute inset-0" style="background:
                radial-gradient(55% 50% at 15% 12%, rgba(255,154,6,.18), transparent 60%),
                radial-gradient(60% 60% at 85% 92%, rgba(115,13,4,.5), transparent 62%),
                linear-gradient(180deg,#160f0c 0%,#0B0B0D 78%)"></div>
            <span class="aurora" style="width:42vw;height:42vw;left:-10%;top:-14%;background:rgba(255,154,6,.22);animation:auroraDrift 16s ease-in-out infinite"></span>
            <div class="absolute inset-0 opacity-[0.04]" style="background-image:linear-gradient(rgba(255,255,255,.6) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.6) 1px,transparent 1px);background-size:46px 46px"></div>
        </div>

        <div class="relative mx-auto max-w-content px-6 pb-20 pt-36 text-center md:pb-24 md:pt-44" data-reveal>
            <span class="inline-flex items-center gap-2 rounded-full border border-gold/25 bg-gold/10 px-3.5 py-1.5 text-xs font-semibold text-gold">
                <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-gold"></span>{{ $career['hero']['eyebrow'] }}
            </span>
            <h1 class="mx-auto mt-5 max-w-3xl font-display text-4xl font-extrabold leading-[1.06] tracking-tight text-ink text-balance sm:text-5xl lg:text-6xl">
                {{ $career['hero']['headline'] }}
            </h1>
            <p class="mx-auto mt-5 max-w-2xl text-base text-ink-2 md:text-lg">{{ $career['hero']['subline'] }}</p>

            <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">
                <a href="#mohon" class="shimmer inline-flex items-center justify-center rounded-xl2 bg-brand px-8 py-4 font-semibold text-white shadow-glow transition hover:brightness-110">{{ $career['hero']['cta_apply'] }}</a>
                <a href="#jawatan" class="glass inline-flex items-center justify-center rounded-xl2 px-8 py-4 font-semibold text-white transition hover:border-white/20">{{ $career['hero']['cta_positions'] }}</a>
            </div>

            <div class="mt-12 flex flex-wrap justify-center gap-x-12 gap-y-6" data-reveal-stagger>
                @foreach ($career['hero']['stats'] as $s)
                    <div>
                        <div class="stat-num font-display text-4xl font-extrabold md:text-5xl" data-count="{{ $s['value'] }}" data-suffix="{{ $s['suffix'] }}">{{ $s['value'] . $s['suffix'] }}</div>
                        <div class="mt-1 text-xs text-ink-3">{{ $s['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CORE VALUES --}}
    <section class="warm-glow border-t border-white/5">
        <div class="mx-auto max-w-content px-6 py-20 md:py-24">
            <x-section-heading :eyebrow="$career['values']['eyebrow']" :heading="$career['values']['heading']" align="center" />
            <div class="mx-auto mt-12 grid max-w-4xl grid-cols-2 gap-4 md:grid-cols-3" data-reveal-stagger>
                @foreach ($career['values']['items'] as $v)
                    <div class="glow-card ring-hover rounded-xl2 border border-white/10 bg-surface p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand/15 font-display text-2xl font-extrabold text-accent">{{ $v['letter'] }}</div>
                        <h3 class="mt-4 font-display text-base font-semibold text-ink">{{ $v['title'] }}</h3>
                        <p class="mt-1 text-sm text-ink-2">{{ $v['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CULTURE + STAFF AWARDS VIDEO --}}
    <section class="warm-glow border-t border-white/5">
        <div class="mx-auto max-w-content px-6 py-24 md:py-28">
            <div class="grid gap-12 md:grid-cols-2 md:items-center md:gap-16">
                <div data-reveal>
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-accent">{{ $career['culture']['eyebrow'] }}</span>
                    <h2 class="mt-3 font-display text-3xl font-bold leading-[1.12] tracking-tight text-ink text-balance md:text-5xl">{{ $career['culture']['heading'] }}</h2>
                    <p class="mt-5 text-ink-2">{{ $career['culture']['body_1'] }}</p>
                    <p class="mt-4 text-ink-2">{{ $career['culture']['body_2'] }}</p>
                </div>
                <div data-reveal>
                    <x-video-embed drive-id="11Ds7S8w9uUdPf7F2vVij7zR6UUWzr3C2"
                        poster="images/gallery/ambience-hall.jpg"
                        eyebrow="Budaya Sofwah" title="Grand Annual Staff Awards 2026"
                        caption="{{ $career['culture']['heading'] }}" />
                </div>
            </div>
        </div>
    </section>

    {{-- LEADERSHIP / ORG --}}
    <section class="warm-glow border-t border-white/5">
        <div class="mx-auto max-w-content px-6 py-24 md:py-28">
            <x-section-heading :eyebrow="$career['leadership']['eyebrow']" :heading="$career['leadership']['heading']" :body="$career['leadership']['body']" align="center" />

            {{-- Founders --}}
            <div class="mx-auto mt-14 flex max-w-2xl flex-col items-center justify-center gap-6 sm:flex-row" data-reveal-stagger>
                @foreach ($tier1 as $i => $m)
                    <div class="flex flex-col items-center text-center">
                        <span class="flex h-28 w-28 items-center justify-center rounded-3xl font-display text-3xl font-extrabold text-white shadow-xl ring-2 ring-white/10" style="background:{{ $avatarGrad[$i % count($avatarGrad)] }}">{{ $initials($m['name']) }}</span>
                        <div class="mt-3 font-display text-lg font-bold text-ink">{{ $m['name'] }}</div>
                        <div class="text-sm text-accent">{{ $m['role'] }}</div>
                    </div>
                @endforeach
            </div>

            {{-- Managers --}}
            <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5" data-reveal-stagger>
                @foreach ($tier2 as $i => $m)
                    <div class="glow-card flex flex-col items-center rounded-xl2 border border-white/10 bg-surface p-5 text-center">
                        <span class="flex h-20 w-20 items-center justify-center rounded-2xl font-display text-xl font-extrabold text-white shadow-lg" style="background:{{ $avatarGrad[$i % count($avatarGrad)] }}">{{ $initials($m['name']) }}</span>
                        <div class="mt-3 text-sm font-semibold text-ink">{{ $m['name'] }}</div>
                        <div class="mt-0.5 text-xs text-ink-3">{{ $m['role'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- OPEN POSITIONS BY DEPARTMENT --}}
    <section id="jawatan" class="warm-glow border-t border-white/5">
        <div class="mx-auto max-w-content px-6 py-24 md:py-32">
            <x-section-heading :eyebrow="$career['openings']['eyebrow']" :heading="$career['openings']['heading']" :body="$career['openings']['body']" align="center" />

            <div class="mt-14 grid gap-5 md:grid-cols-2 lg:grid-cols-3" data-reveal-stagger>
                @foreach ($org['departments'] as $d)
                    @php
                        $deptName = $lang === 'en' ? $d['name_en'] : $d['name_bm'];
                        $deptText = ($lang === 'en' ? 'Assalamualaikum Sofwah, I\'m interested in the ' : 'Assalamualaikum Sofwah, saya berminat dengan jabatan ') . $deptName . ($lang === 'en' ? ' team at Sofwah Arabic Grill.' : ' di Sofwah Arabic Grill.');
                        $deptWa = $waBase . rawurlencode($deptText);
                    @endphp
                    <div class="glow-card ring-hover flex flex-col rounded-xl3 border border-white/10 bg-gradient-to-b from-surface to-[#101012] p-6">
                        <h3 class="font-display text-xl font-bold text-ink">{{ $deptName }}</h3>
                        <p class="mt-1 text-xs text-ink-3">{{ $career['openings']['lead_label'] }}: <span class="text-ink-2">{{ $d['lead'] }}</span></p>
                        <ul class="mt-5 flex flex-1 flex-wrap content-start gap-2">
                            @foreach ($d['roles'] as $role)
                                <li class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-bg px-3 py-1.5 text-sm text-ink-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-accent"></span>{{ $role }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ $deptWa }}" target="_blank" rel="noopener"
                           class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl2 bg-brand px-5 py-3 text-sm font-semibold text-white transition hover:brightness-110 hover:shadow-glow">
                            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15l-1.3 4.7 4.8-1.3A10 10 0 1 0 12 2Zm5.5 14.2c-.2.6-1.2 1.2-1.7 1.2-.5.1-1 .1-3.2-.7-2.7-1.1-4.4-3.9-4.5-4-.1-.2-1-1.4-1-2.6s.6-1.8.9-2.1c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .6.5l.8 2c.1.1.1.3 0 .5l-.4.6-.3.3c-.2.1-.3.3-.1.6.2.3.9 1.4 1.9 2.3 1.3 1.1 2.3 1.5 2.6 1.6.3.1.5.1.7-.1l.9-1c.2-.3.4-.2.6-.1l1.9.9c.3.2.5.2.5.4.1.2.1.9-.1 1.4Z"/></svg>
                            {{ $career['openings']['dept_apply'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- BENEFITS --}}
    <section class="warm-glow border-t border-white/5">
        <div class="mx-auto max-w-content px-6 py-20 md:py-24">
            <x-section-heading :eyebrow="$career['benefits']['eyebrow']" :heading="$career['benefits']['heading']" align="center" />
            <div class="mx-auto mt-10 flex max-w-3xl flex-wrap justify-center gap-2.5" data-reveal-stagger>
                @foreach ($career['benefits']['items'] as $b)
                    <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-surface px-4 py-2.5 text-sm text-ink-2">
                        <svg viewBox="0 0 20 20" class="h-4 w-4 text-accent" fill="none" aria-hidden="true"><path d="M4 10.5l3.5 3.5L16 5.5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        {{ $b }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- APPLY CTA --}}
    <section id="mohon" class="relative overflow-hidden border-t border-white/5">
        <div class="absolute inset-0" aria-hidden="true" style="background:
            radial-gradient(70% 60% at 50% 0%, rgba(115,13,4,.5), transparent 62%),
            radial-gradient(50% 50% at 50% 110%, rgba(255,154,6,.16), transparent 60%),
            linear-gradient(180deg,#160f0c,#0B0B0D)"></div>
        <div class="relative mx-auto max-w-content px-6 py-28 text-center md:py-36" data-reveal>
            <span class="text-xs font-semibold uppercase tracking-[0.22em] text-accent">{{ $career['apply']['eyebrow'] }}</span>
            <h2 class="mx-auto mt-4 max-w-2xl font-display text-4xl font-extrabold leading-[1.08] tracking-tight text-ink text-balance md:text-5xl">{{ $career['apply']['heading'] }}</h2>
            <p class="mx-auto mt-5 max-w-xl text-ink-2 md:text-lg">{{ $career['apply']['body'] }}</p>
            <a href="{{ $applyGeneral }}" target="_blank" rel="noopener"
               class="shimmer mt-9 inline-flex items-center justify-center gap-2 rounded-xl2 bg-brand px-8 py-4 font-semibold text-white shadow-glow transition hover:brightness-110">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor" aria-hidden="true"><path d="M12 2a10 10 0 0 0-8.6 15l-1.3 4.7 4.8-1.3A10 10 0 1 0 12 2Zm5.5 14.2c-.2.6-1.2 1.2-1.7 1.2-.5.1-1 .1-3.2-.7-2.7-1.1-4.4-3.9-4.5-4-.1-.2-1-1.4-1-2.6s.6-1.8.9-2.1c.2-.2.5-.3.6-.3h.5c.2 0 .4 0 .6.5l.8 2c.1.1.1.3 0 .5l-.4.6-.3.3c-.2.1-.3.3-.1.6.2.3.9 1.4 1.9 2.3 1.3 1.1 2.3 1.5 2.6 1.6.3.1.5.1.7-.1l.9-1c.2-.3.4-.2.6-.1l1.9.9c.3.2.5.2.5.4.1.2.1.9-.1 1.4Z"/></svg>
                {{ $career['apply']['cta'] }}
            </a>
            <p class="mt-4 text-xs text-ink-3">{{ $career['apply']['note'] }}</p>
        </div>
    </section>
@endsection
