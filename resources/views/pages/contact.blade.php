@extends('layouts.app')

@section('content')
@php($cafe = config('cafe'))

<section class="section-shell py-16 lg:py-24">
    <x-section-heading
        eyebrow="Kontak"
        title="Info yang biasanya dibutuhkan pengunjung sebelum datang"
        description="Portofolio kafe yang baik menaruh alamat, jam buka, kontak, dan opsi reservasi di tempat yang sangat mudah ditemukan."
    />

    <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <div class="glass-panel p-6">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-coffee-500">Alamat</p>
            <p class="mt-3 text-lg font-bold text-coffee-900">{{ $cafe['contact']['address'] }}</p>
        </div>
        <div class="glass-panel p-6">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-coffee-500">Telepon</p>
            <p class="mt-3 text-lg font-bold text-coffee-900">{{ $cafe['contact']['phone'] }}</p>
        </div>
        <div class="glass-panel p-6">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-coffee-500">Jam buka</p>
            <p class="mt-3 text-lg font-bold text-coffee-900">{{ $cafe['contact']['hours'] }}</p>
        </div>
        <div class="glass-panel p-6">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-coffee-500">Instagram</p>
            <p class="mt-3 text-lg font-bold text-coffee-900">{{ $cafe['contact']['instagram'] }}</p>
        </div>
    </div>
</section>

<section class="section-shell py-6 lg:py-10">
    <div class="grid gap-8 lg:grid-cols-[1fr_0.9fr]">
        <div class="glass-panel p-8">
            <h2 class="font-display text-3xl font-extrabold tracking-tight text-coffee-900">Form reservasi sederhana</h2>
            <p class="mt-4 max-w-2xl text-lg leading-8 text-coffee-700">Form ini bisa dijadikan dasar untuk integrasi email, WhatsApp, atau database reservasi di tahap berikutnya.</p>

            <form class="mt-8 grid gap-5">
                <div>
                    <label class="mb-2 block text-sm font-semibold text-coffee-700" for="name">Nama</label>
                    <input id="name" type="text" class="w-full rounded-2xl border border-coffee-200 bg-white/90 px-4 py-3 text-coffee-900 outline-none ring-0 focus:border-coffee-400 focus:ring-2 focus:ring-coffee-200" placeholder="Nama pengunjung">
                </div>
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-coffee-700" for="date">Tanggal</label>
                        <input id="date" type="date" class="w-full rounded-2xl border border-coffee-200 bg-white/90 px-4 py-3 text-coffee-900 outline-none ring-0 focus:border-coffee-400 focus:ring-2 focus:ring-coffee-200">
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-coffee-700" for="time">Jam</label>
                        <input id="time" type="time" class="w-full rounded-2xl border border-coffee-200 bg-white/90 px-4 py-3 text-coffee-900 outline-none ring-0 focus:border-coffee-400 focus:ring-2 focus:ring-coffee-200">
                    </div>
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-coffee-700" for="note">Catatan</label>
                    <textarea id="note" rows="5" class="w-full rounded-2xl border border-coffee-200 bg-white/90 px-4 py-3 text-coffee-900 outline-none ring-0 focus:border-coffee-400 focus:ring-2 focus:ring-coffee-200" placeholder="Misalnya untuk meeting kecil, ulang tahun, atau gathering"></textarea>
                </div>

                <div class="flex flex-wrap gap-4">
                    <button type="button" class="coffee-button-primary">Kirim Reservasi</button>
                    <a href="mailto:{{ $cafe['contact']['email'] }}" class="coffee-button-secondary">Email Langsung</a>
                </div>
            </form>
        </div>

        <div class="grid gap-6">
            <div class="glass-panel p-8">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-coffee-500">Apa yang biasanya ditampilkan</p>
                <ul class="mt-4 space-y-3 text-coffee-700">
                    <li>Jam buka dan hari operasional</li>
                    <li>Lokasi dan petunjuk arah</li>
                    <li>Link peta, telepon, dan sosial media</li>
                    <li>Fasilitas seperti Wi-Fi, parkir, dan colokan</li>
                    <li>CTA untuk booking meja atau event</li>
                </ul>
            </div>

            <div class="glass-panel overflow-hidden">
                <img src="{{ $cafe['gallery'][3]['image'] }}" alt="{{ $cafe['gallery'][3]['title'] }}" class="h-72 w-full object-cover">
                <div class="p-6">
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-coffee-500">Ruang event</p>
                    <p class="mt-3 text-lg leading-8 text-coffee-800">Cocok untuk workshop, live music, atau private gathering yang ingin dipromosikan lewat portofolio.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection