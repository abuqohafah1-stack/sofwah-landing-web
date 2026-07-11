{{-- sections/reserve.blade.php — lead capture (Livewire) + cinematic side image --}}
<section id="tempah" class="warm-glow border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-24 md:py-32">
        <div class="grid gap-10 md:grid-cols-2 md:items-stretch md:gap-14">
            {{-- Image --}}
            <div class="relative overflow-hidden rounded-xl3 border border-white/10" data-reveal>
                <x-img src="images/menu-ai/al-firdaus.jpg"
                       alt="Al-Firdaus Platter Sofwah — hidangan untuk raikan bersama keluarga"
                       class="aspect-[4/5] w-full object-cover md:h-full" />
                <div class="absolute inset-0" style="background:linear-gradient(180deg,transparent 50%,rgba(11,11,13,.7))"></div>
                <div class="absolute bottom-6 left-6">
                    <p class="font-arabic text-xl text-gold" dir="rtl">طبق العائلة</p>
                    <p class="mt-1 text-lg font-semibold text-ink">Raikan bersama Sofwah</p>
                </div>
            </div>

            {{-- Form --}}
            <div data-reveal>
                <x-section-heading
                    :eyebrow="$c['reserve']['eyebrow']"
                    :heading="$c['reserve']['heading']"
                    :body="$c['reserve']['body']" />
                <div class="mt-8">
                    <livewire:reservation-form :lang="$lang" />
                </div>
            </div>
        </div>
    </div>
</section>
