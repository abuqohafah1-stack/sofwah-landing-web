{{--
  components/order-sheet.blade.php — persistent mobile CTA + slide-up branch picker.
  Stateless UI → implemented with Alpine (no server round-trip needed). Order → WhatsApp
  per branch; "use my location" sorts branches (with coords) by distance client-side.
--}}
@props(['branches' => [], 't' => []])

<div x-data="orderSheet()">
    {{-- Persistent mobile bar --}}
    <div class="fixed inset-x-0 bottom-0 z-40 flex gap-2 border-t border-white/10 bg-bg/85 p-3 backdrop-blur-glass md:hidden">
        <button type="button" @click="open()" class="flex-1 rounded-xl2 bg-brand py-3 text-center text-sm font-semibold text-white">
            {{ $t['order'] }}
        </button>
        <a href="#cawangan" class="glass flex-1 rounded-xl2 py-3 text-center text-sm font-semibold text-white">
            {{ $t['branches'] }}
        </a>
    </div>

    {{-- Slide-up sheet --}}
    <div x-show="isOpen" x-cloak class="fixed inset-0 z-[60]" @keydown.escape.window="close()">
        <div class="absolute inset-0 bg-black/60" @click="close()"
             x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"></div>

        <div class="absolute inset-x-0 bottom-0 mx-auto max-w-lg rounded-t-xl3 border-t border-white/10 bg-surface p-6"
             x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-y-full" x-transition:enter-end="translate-y-0"
             x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-y-0" x-transition:leave-end="translate-y-full"
             role="dialog" aria-modal="true" aria-label="{{ $t['title'] }}">
            <div class="mx-auto mb-4 h-1 w-10 rounded-full bg-white/20"></div>
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h2 class="font-display text-lg font-semibold text-ink">{{ $t['title'] }}</h2>
                    <p class="text-sm text-ink-3">{{ $t['subtitle'] }}</p>
                </div>
                <button type="button" @click="close()" class="text-xl leading-none text-ink-3 hover:text-ink" aria-label="Tutup">&times;</button>
            </div>

            <button type="button" @click="useLocation()"
                    class="glass mt-4 w-full rounded-xl2 py-2.5 text-sm font-medium text-white">
                <span x-show="!locating">📍 {{ $t['nearest'] }}</span>
                <span x-show="locating">…</span>
            </button>

            <ul class="mt-3 max-h-[50vh] space-y-2 overflow-y-auto" x-ref="list">
                @foreach ($branches as $b)
                    <li data-lat="{{ $b['lat'] ?? '' }}" data-lng="{{ $b['lng'] ?? '' }}">
                        <a href="{{ $b['wa'] }}" target="_blank" rel="noopener"
                           class="flex items-center justify-between gap-3 rounded-xl2 border border-white/10 bg-bg px-4 py-3 transition hover:border-white/25">
                            <span class="text-sm font-medium text-ink">Sofwah {{ $b['city'] }}@if ($b['area']) · {{ $b['area'] }}@endif</span>
                            <span class="shrink-0 text-xs font-semibold text-accent">★ {{ $b['rating'] }} · WhatsApp →</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@once
    @push('scripts')
    <script>
        function orderSheet() {
            return {
                isOpen: false,
                locating: false,
                open()  { this.isOpen = true;  document.body.style.overflow = 'hidden'; },
                close() { this.isOpen = false; document.body.style.overflow = ''; },
                useLocation() {
                    if (!navigator.geolocation) return;
                    this.locating = true;
                    navigator.geolocation.getCurrentPosition(
                        (pos) => {
                            const { latitude: la, longitude: lo } = pos.coords;
                            const km = (aLat, aLng, bLat, bLng) => {
                                const R = 6371, r = (x) => x * Math.PI / 180;
                                const dLa = r(bLat - aLat), dLo = r(bLng - aLng);
                                const s = Math.sin(dLa / 2) ** 2 + Math.cos(r(aLat)) * Math.cos(r(bLat)) * Math.sin(dLo / 2) ** 2;
                                return 2 * R * Math.asin(Math.sqrt(s));
                            };
                            const list = this.$refs.list;
                            [...list.children]
                                .map((el) => {
                                    const lat = parseFloat(el.dataset.lat), lng = parseFloat(el.dataset.lng);
                                    el._d = isNaN(lat) ? Infinity : km(la, lo, lat, lng);
                                    return el;
                                })
                                .sort((a, b) => a._d - b._d)
                                .forEach((el) => list.appendChild(el));
                            this.locating = false;
                        },
                        () => { this.locating = false; }
                    );
                },
            };
        }
    </script>
    @endpush
@endonce
