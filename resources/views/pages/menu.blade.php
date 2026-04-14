@extends('layouts.app')

@section('content')
@php($cafe = config('cafe'))

<section class="section-shell py-16 lg:py-24">
    <x-section-heading
        eyebrow="Menu"
        title="Koleksi menu yang mewakili karakter kafe"
        description="Menu di portofolio kafe biasanya difoto dan ditulis singkat agar calon pengunjung cepat memahami vibe dan harga."
    />

    <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($cafe['menu'] as $item)
            <x-menu-card :item="$item" />
        @endforeach
    </div>
</section>

<section class="section-shell py-6 lg:py-10">
    <div class="glass-panel grid gap-8 p-8 lg:grid-cols-[1fr_auto] lg:items-center">
        <div>
            <h2 class="font-display text-3xl font-extrabold tracking-tight text-coffee-900">Promo dan set menu bisa ditambahkan kapan saja.</h2>
            <p class="mt-4 max-w-3xl text-lg leading-8 text-coffee-700">Struktur ini disiapkan agar mudah dikembangkan saat kafe mulai menambah seasonal menu, promo bundling, atau menu event.</p>
        </div>
        <a href="{{ route('contact') }}" class="coffee-button-primary">Request Menu</a>
    </div>
</section>
@endsection