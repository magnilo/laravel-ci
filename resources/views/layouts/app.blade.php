<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('cafe.brand.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('head')
</head>
<body class="min-h-screen overflow-x-hidden">
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute left-[-8rem] top-16 h-72 w-72 rounded-full bg-coffee-200/40 blur-3xl"></div>
        <div class="absolute right-[-7rem] top-24 h-80 w-80 rounded-full bg-coffee-700/10 blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 h-64 w-64 rounded-full bg-coffee-400/10 blur-3xl"></div>
    </div>

    <header class="sticky top-0 z-50 border-b border-white/70 bg-white/70 backdrop-blur-xl">
        <div class="section-shell flex items-center justify-between py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 font-display text-lg font-extrabold tracking-tight text-coffee-900">
                <span class="grid h-11 w-11 place-items-center rounded-full bg-gradient-to-br from-coffee-700 to-coffee-400 text-white shadow-soft">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M6 7h11v5.5A5.5 5.5 0 0 1 11.5 18H10A4 4 0 0 1 6 14V7Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                        <path d="M17 9h1.2a2.8 2.8 0 0 1 0 5.6H17" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M8 4c0 1 .8 1.2.8 2.2S8 7.4 8 8.4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M12 3.5c0 1 .8 1.2.8 2.2S12 6.9 12 7.9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                </span>
                <span>{{ config('cafe.brand.name') }}</span>
            </a>

            <nav class="hidden items-center gap-3 md:flex">
                <a href="{{ route('home') }}" class="rounded-full px-4 py-2 text-sm font-semibold {{ request()->routeIs('home') ? 'bg-coffee-700 text-white shadow-soft' : 'text-coffee-700 hover:bg-white' }}">Beranda</a>
                <a href="{{ route('menu') }}" class="rounded-full px-4 py-2 text-sm font-semibold {{ request()->routeIs('menu') ? 'bg-coffee-700 text-white shadow-soft' : 'text-coffee-700 hover:bg-white' }}">Menu</a>
                <a href="{{ route('gallery') }}" class="rounded-full px-4 py-2 text-sm font-semibold {{ request()->routeIs('gallery') ? 'bg-coffee-700 text-white shadow-soft' : 'text-coffee-700 hover:bg-white' }}">Galeri</a>
                <a href="{{ route('contact') }}" class="rounded-full px-4 py-2 text-sm font-semibold {{ request()->routeIs('contact') ? 'bg-coffee-700 text-white shadow-soft' : 'text-coffee-700 hover:bg-white' }}">Kontak</a>
            </nav>

            <a href="{{ route('contact') }}" class="coffee-button-secondary hidden md:inline-flex">Reservasi</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-white/70 bg-white/70 backdrop-blur-xl">
        <div class="section-shell flex flex-col gap-4 py-8 text-sm text-coffee-700 md:flex-row md:items-center md:justify-between">
            <p>Portofolio kafe {{ config('cafe.brand.name') }}. Siap dipakai untuk CI/CD practice.</p>
            <p>Laravel 8, Tailwind CSS, GitHub Actions, GitLab CI, dan Jenkins.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>