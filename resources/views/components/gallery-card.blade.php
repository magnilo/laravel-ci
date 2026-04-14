@props(['tile'])

<article class="glass-panel overflow-hidden {{ $tile['size'] === 'large' ? 'md:col-span-2 md:row-span-2' : '' }} {{ $tile['size'] === 'medium' ? 'md:row-span-2' : '' }}">
    <div class="relative h-full min-h-[18rem]">
        <img src="{{ $tile['image'] }}" alt="{{ $tile['title'] }}" class="absolute inset-0 h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-coffee-900/85 via-coffee-900/10 to-transparent"></div>
        <div class="absolute inset-x-0 bottom-0 p-5 text-white">
            <p class="text-sm font-semibold uppercase tracking-[0.26em] text-coffee-100/80">Galeri</p>
            <h3 class="mt-2 text-lg font-bold">{{ $tile['title'] }}</h3>
        </div>
    </div>
</article>