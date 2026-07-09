<div>
    @php $cities = collect($branches)->keyBy('key'); @endphp

    {{-- Filters --}}
    <div class="flex flex-wrap items-center gap-3">
        <select wire:model.live="branch"
                class="rounded-xl2 border border-white/10 bg-bg px-4 py-2.5 text-sm text-ink focus:border-accent focus:outline-none">
            <option value="all">{{ $lang === 'en' ? 'All branches' : 'Semua cawangan' }}</option>
            @foreach ($branches as $b)
                <option value="{{ $b['key'] }}">Sofwah {{ $b['city'] }}@if ($b['area']) ({{ $b['area'] }})@endif</option>
            @endforeach
        </select>

        <div class="inline-flex overflow-hidden rounded-xl2 border border-white/10 text-sm">
            @foreach ([0 => ($lang === 'en' ? 'All' : 'Semua'), 5 => '5★', 4 => '4★+'] as $val => $lbl)
                <button type="button" wire:click="$set('minRating', {{ $val }})"
                        class="px-3.5 py-2.5 font-medium transition {{ $minRating === $val ? 'bg-brand text-white' : 'text-ink-3 hover:text-ink' }}">
                    {{ $lbl }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- Filtered cards --}}
    <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3" wire:loading.class="opacity-50">
        @forelse ($reviews as $r)
            @php $card = $r; $card['branch'] = 'Sofwah ' . ($cities[$r['branch']]['city'] ?? $r['branch']); @endphp
            <x-review-card :review="$card" />
        @empty
            <p class="text-sm text-ink-3">{{ $lang === 'en' ? 'No reviews for this filter yet.' : 'Tiada review untuk tapisan ini.' }}</p>
        @endforelse
    </div>
</div>
