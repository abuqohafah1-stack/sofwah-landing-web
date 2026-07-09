{{-- sections/reserve.blade.php — lead capture (Livewire ReservationForm → DB + WhatsApp) --}}
<section id="tempah" class="border-t border-white/5">
    <div class="mx-auto max-w-content px-6 py-24 md:py-32">
        <x-section-heading
            :eyebrow="$c['reserve']['eyebrow']"
            :heading="$c['reserve']['heading']"
            :body="$c['reserve']['body']"
            align="center" />

        <div class="mt-12">
            <livewire:reservation-form :lang="$lang" />
        </div>
    </div>
</section>
