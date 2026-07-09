@extends('layouts.app')

@section('content')
    {{-- 1 · Hero — REALIZE --}}
    <x-hero :hero="$c['hero']" image="images/hero/cover-home-1920.jpg" order-url="#cawangan" />

    {{-- 2 · Signature Dining — RASA / Desire --}}
    @include('sections.signature-dining')

    {{-- 3 · Why Sofwah — Trust --}}
    @include('sections.why-sofwah')

    {{-- 4 · Signature Menu — Craving --}}
    @include('sections.signature-menu')

    {{-- 5 · Wall of Love — REVIEW / Trust --}}
    @include('sections.wall-of-love')

    {{-- 6 · Brand Story — emotional connection --}}
    @include('sections.brand-story')

    {{-- 7 · Branch Experience — REACH --}}
    @include('sections.branches')

    {{-- 8 · Family Dining — memory over transaction --}}
    @include('sections.family')

    {{-- 9 · FAQ — Confidence --}}
    @include('sections.faq')

    {{-- 10 · Reserve / enquiry — lead capture (Livewire → DB + WhatsApp) --}}
    @include('sections.reserve')

    {{-- 11 · Final conversion — Action --}}
    @include('sections.final-cta')
@endsection
