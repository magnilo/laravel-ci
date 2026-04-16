@extends('layouts.app')

@section('content')
@php($cafe = config('cafe'))

<section class="section-shell py-16 lg:py-24">
    <div class="grid gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
        <div>
            <span class="section-badge">Portofolio kafe modern</span>
            <h1 class="mt-6 max-w-3xl font-display text-5xl font-extrabold tracking-tight text-coffee-900 sm:text-6xl lg:text-7xl">
                {{ $cafe['brand']['tagline'] }}
            </h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-coffee-700">
                {{ $cafe['brand']['description'] }}
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('menu') }}" class="coffee-button-primary">Lihat Menu</a>
                <a href="{{ route('gallery') }}" class="coffee-button-secondary">Jelajahi Galeri Kami</a>
                <a href="{{ route('contact') }}" class="coffee-button-secondary">Reservasi</a>
            </div>

            <div class="mt-10 grid gap-4 sm:grid-cols-3">
                @foreach ($cafe['stats'] as $stat)
                    <div class="glass-panel p-5">
                        <p class="text-sm font-semibold uppercase tracking-[0.22em] text-coffee-500">{{ $stat['label'] }}</p>
                        <p class="mt-2 text-2xl font-extrabold text-coffee-900">{{ $stat['value'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="glass-panel hero-gradient overflow-hidden p-4 lg:p-5">
            <div class="relative overflow-hidden rounded-[1.75rem]">
                <img src="{{ $cafe['gallery'][0]['image'] }}" alt="{{ $cafe['gallery'][0]['title'] }}" class="h-[36rem] w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-coffee-900/80 via-coffee-900/5 to-transparent"></div>
                <div class="absolute inset-x-0 bottom-0 p-6 text-white">
                    <div class="grid gap-4 rounded-[1.5rem] border border-white/15 bg-coffee-900/45 p-5 backdrop-blur-md sm:grid-cols-2">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-coffee-100/80">Signature atmosphere</p>
                            <p class="mt-2 text-lg font-bold">Interior hangat, cocok untuk kerja dan meeting kecil.</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-coffee-100/80">Free Wi-Fi</p>
                            <p class="mt-2 text-lg font-bold">Nyaman untuk pelanggan yang ingin belajar atau bekerja.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-shell py-6 lg:py-10">
    <x-section-heading
        eyebrow="Fitur umum"
        title="Elemen yang biasanya wajib ada pada portofolio kafe"
        description="Pengunjung perlu langsung menemukan menu, galeri, lokasi, jam operasional, dan reservasi tanpa harus mencari terlalu jauh."
    />

    <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        @foreach ($cafe['features'] as $feature)
            <x-feature-card :feature="$feature" />
        @endforeach
    </div>
</section>

<section class="section-shell py-16 lg:py-24">
    <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
        <div class="glass-panel p-8">
            <x-section-heading
                eyebrow="Kenapa desain ini kuat"
                title="Struktur dibuat seperti presentasi singkat yang mudah dipahami"
                description="Hero yang jelas, kartu menu yang visual, dan penutup yang langsung mengarah ke kontak membuat halaman ini cocok untuk portofolio bisnis."
            />

            <div class="mt-8 flex flex-wrap gap-3">
                <span class="rounded-full border border-coffee-200 bg-white/80 px-4 py-2 text-sm font-semibold text-coffee-700">Brand story</span>
                <span class="rounded-full border border-coffee-200 bg-white/80 px-4 py-2 text-sm font-semibold text-coffee-700">Menu highlight</span>
                <span class="rounded-full border border-coffee-200 bg-white/80 px-4 py-2 text-sm font-semibold text-coffee-700">Photo gallery</span>
                <span class="rounded-full border border-coffee-200 bg-white/80 px-4 py-2 text-sm font-semibold text-coffee-700">Reservasi</span>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            @foreach ($cafe['testimonials'] as $testimonial)
                <x-testimonial-card :testimonial="$testimonial" />
            @endforeach
        </div>
    </div>
</section>

<section class="section-shell py-6 lg:py-10">
    <x-section-heading
        eyebrow="Menu unggulan"
        title="Beberapa item yang paling mudah dijual secara visual"
        description="Halaman menu pada situs kafe idealnya menampilkan item signature agar calon pelanggan cepat tertarik."
    />

    <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach (array_slice($cafe['menu'], 0, 3) as $item)
            <x-menu-card :item="$item" />
        @endforeach
    </div>
</section>

<section class="section-shell py-16 lg:py-24">
    <div class="glass-panel grid gap-8 p-8 lg:grid-cols-[1fr_auto] lg:items-center">
        <div>
            <x-section-heading
                eyebrow="CTA"
                title="Siap dipakai untuk profil kafe, promo, atau landing page reservasi"
                description="Tampilan ini sudah aman untuk dihubungkan ke GitHub, GitLab, dan Jenkins karena alur build-nya sederhana dan terpisah dari konten."
            />
        </div>

        <div class="flex flex-wrap gap-4">
            <a href="{{ route('menu') }}" class="coffee-button-primary">Buka Menu</a>
            <a href="{{ route('contact') }}" class="coffee-button-secondary">Hubungi Kami</a>
        </div>
    </div>
</section>
@endsection