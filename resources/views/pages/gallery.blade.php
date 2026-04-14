@extends('layouts.app')

@section('content')
@php($cafe = config('cafe'))

<section class="section-shell py-16 lg:py-24">
    <x-section-heading
        eyebrow="Galeri"
        title="Tunjukkan suasana, bukan hanya produk"
        description="Galeri yang kuat membantu orang membayangkan ruang duduk, pencahayaan, sudut foto, dan kualitas penyajian."
    />

    <div class="mt-10 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($cafe['gallery'] as $tile)
            <x-gallery-card :tile="$tile" />
        @endforeach
    </div>
</section>

<section class="section-shell py-6 lg:py-10">
    <div class="grid gap-6 md:grid-cols-3">
        <div class="glass-panel p-6">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-coffee-500">Lighting</p>
            <p class="mt-3 text-lg font-bold text-coffee-900">Cerah pada siang hari, hangat di malam hari.</p>
        </div>
        <div class="glass-panel p-6">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-coffee-500">Seating</p>
            <p class="mt-3 text-lg font-bold text-coffee-900">Area kerja, meja pasangan, dan ruang berkumpul kecil.</p>
        </div>
        <div class="glass-panel p-6">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-coffee-500">Content</p>
            <p class="mt-3 text-lg font-bold text-coffee-900">Cocok untuk Instagram, website, dan materi promosi.</p>
        </div>
    </div>
</section>
@endsection