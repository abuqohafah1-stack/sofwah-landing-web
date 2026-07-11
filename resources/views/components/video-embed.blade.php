{{--
  components/video-embed.blade.php — lite-facade video: a poster + play button loads
  first; the Google Drive player is injected only on click (fast first paint). Alpine
  (via Livewire) drives the toggle.
  NOTE: the Drive file must be shared "Anyone with the link · Viewer" to play publicly.
--}}
@props([
    'driveId' => '',
    'poster'  => 'images/gallery/ambience-hall.jpg',
    'eyebrow' => '',
    'title'   => '',
    'caption' => '',
])

<div x-data="{ play: false }"
     class="ring-hover relative aspect-video overflow-hidden rounded-xl3 border border-white/12 shadow-[0_40px_90px_-24px_rgba(0,0,0,.7)]">

    <button type="button" x-show="!play" @click="play = true"
            class="group absolute inset-0 h-full w-full text-left" aria-label="Main video: {{ $title }}">
        <x-img :src="$poster" alt="{{ $title }}"
               class="h-full w-full object-cover transition duration-700 group-hover:scale-105" />
        <div class="absolute inset-0" style="background:
            radial-gradient(60% 60% at 50% 45%, rgba(115,13,4,.35), transparent 60%),
            linear-gradient(180deg, rgba(11,11,13,.42), rgba(11,11,13,.82))"></div>

        <span class="absolute inset-0 flex items-center justify-center">
            <span class="flex h-[4.5rem] w-[4.5rem] items-center justify-center rounded-full bg-brand shadow-glow ring-1 ring-white/25 transition duration-300 group-hover:scale-110">
                <svg viewBox="0 0 24 24" class="ml-1 h-8 w-8 text-white" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
            </span>
        </span>

        <span class="absolute inset-x-0 bottom-0 p-6 md:p-8">
            @if ($eyebrow)<span class="block text-xs font-semibold uppercase tracking-[0.2em] text-gold">{{ $eyebrow }}</span>@endif
            <span class="mt-1 block font-display text-xl font-bold text-ink md:text-3xl">{{ $title }}</span>
            @if ($caption)<span class="mt-1 block text-sm text-ink-2 md:text-base">{{ $caption }}</span>@endif
        </span>
    </button>

    <template x-if="play">
        <iframe class="absolute inset-0 h-full w-full"
                src="https://drive.google.com/file/d/{{ $driveId }}/preview"
                allow="autoplay; fullscreen" allowfullscreen title="{{ $title }}"></iframe>
    </template>
</div>
