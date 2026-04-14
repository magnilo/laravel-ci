@props(['item'])

<article class="glass-panel overflow-hidden">
    <div class="relative aspect-[4/3] overflow-hidden">
        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="h-full w-full object-cover">
        <div class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold uppercase tracking-[0.24em] text-coffee-700">
            {{ $item['badge'] }}
        </div>
    </div>

    <div class="p-6">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h3 class="text-xl font-bold text-coffee-900">{{ $item['name'] }}</h3>
                <p class="mt-2 leading-7 text-coffee-700">{{ $item['description'] }}</p>
            </div>

            <span class="shrink-0 rounded-full bg-coffee-700 px-3 py-1 text-sm font-bold text-white">{{ $item['price'] }}</span>
        </div>
    </div>
</article>