{{--
  components/img.blade.php — responsive <picture>: AVIF → WebP → JPEG fallback.
  Variants are produced by scripts/optimize-images.mjs. `class` (and any other
  attribute) is applied to the <img>; the <picture> uses display:contents so the
  <img> lays out as if it were a direct child of the parent.
--}}
@props([
    'src'           => '',
    'alt'           => '',
    'width'         => null,
    'height'        => null,
    'loading'       => 'lazy',
    'fetchpriority' => null,
])
@php $base = preg_replace('/\.(jpe?g|png)$/i', '', $src); @endphp

<picture class="contents">
    <source srcset="{{ asset($base . '.avif') }}" type="image/avif">
    <source srcset="{{ asset($base . '.webp') }}" type="image/webp">
    <img src="{{ asset($src) }}" alt="{{ $alt }}"
         loading="{{ $loading }}" decoding="async"
         @if ($fetchpriority) fetchpriority="{{ $fetchpriority }}" @endif
         @if ($width) width="{{ $width }}" @endif
         @if ($height) height="{{ $height }}" @endif
         {{ $attributes }}>
</picture>
