{{-- sections/why-sofwah.blade.php — Trust · Before → After + proof tiles --}}
<section id="kenapa" class="border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-24 md:py-32">
        <div class="grid items-center gap-10 md:grid-cols-2 md:gap-16">
            <div>
                <span class="text-xs font-semibold uppercase tracking-[0.22em] text-accent">{{ $c['why']['eyebrow'] }}</span>
                <div class="mt-4 space-y-2.5">
                    <p class="text-lg text-ink-3 line-through decoration-brand/70 decoration-2">{{ $c['why']['before'] }}</p>
                    <p class="font-display text-2xl font-bold leading-tight text-ink text-balance md:text-4xl">{{ $c['why']['after'] }}</p>
                </div>
                <p class="mt-5 text-ink-2">{{ $c['why']['body'] }}</p>
            </div>

            <div class="overflow-hidden rounded-xl3 border border-white/10">
                <x-img src="images/gallery/ambience-hall.jpg"
                       alt="Ruang makan Sofwah yang bersih, hangat dan mesra keluarga"
                       class="aspect-[4/3] w-full object-cover" />
            </div>
        </div>

        <div class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($c['why']['proof'] as $p)
                <div class="rounded-xl2 border border-white/10 bg-surface p-6">
                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-brand/15 text-accent" aria-hidden="true">
                        <svg viewBox="0 0 20 20" fill="none" class="h-4 w-4"><path d="M4 10.5l3.5 3.5L16 5.5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <h3 class="mt-4 font-display text-base font-semibold text-ink">{{ $p['title'] }}</h3>
                    <p class="mt-1.5 text-sm text-ink-2">{{ $p['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
