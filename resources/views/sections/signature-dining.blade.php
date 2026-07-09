{{-- sections/signature-dining.blade.php — RASA / Desire · cinematic sensory band --}}
<section id="dining" class="relative overflow-hidden">
    <div class="absolute inset-0" aria-hidden="true">
        <x-img src="images/gallery/ambience-lamps.jpg" alt=""
               class="h-full w-full object-cover" />
        <div class="absolute inset-0" style="background:
            linear-gradient(180deg, #0B0B0D 0%, rgba(11,11,13,.72) 26%, rgba(11,11,13,.80) 74%, #0B0B0D 100%)"></div>
    </div>

    <div class="relative mx-auto max-w-content px-6 py-24 md:py-32">
        <x-section-heading
            :eyebrow="$c['dining']['eyebrow']"
            :heading="$c['dining']['heading']"
            :body="$c['dining']['body']" />

        <div class="mt-12 grid gap-4 sm:grid-cols-3" data-reveal-stagger>
            @foreach ($c['dining']['senses'] as $s)
                <div class="glass rounded-xl2 p-6">
                    <p class="text-xs font-semibold uppercase tracking-[0.16em] text-gold">{{ $s['label'] }}</p>
                    <p class="mt-2 text-sm text-ink-2">{{ $s['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
