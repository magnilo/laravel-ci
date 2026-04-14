@props(['feature'])

<article class="glass-panel p-6">
    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-coffee-700/10 text-coffee-700">
        @switch($feature['icon'])
            @case('cup')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M6 8h11v4.5A5.5 5.5 0 0 1 11.5 18H11A5 5 0 0 1 6 13V8Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M17 9h1.1a2.9 2.9 0 0 1 0 5.8H17" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
                @break
            @case('camera')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M5.5 8.5h2.8l1.1-2h5.2l1.1 2h2.8A2.5 2.5 0 0 1 21 11v6.5A2.5 2.5 0 0 1 18.5 20h-13A2.5 2.5 0 0 1 3 17.5V11a2.5 2.5 0 0 1 2.5-2.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M12 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" stroke="currentColor" stroke-width="1.8"/>
                </svg>
                @break
            @case('map')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 20s5.5-4.4 5.5-9.5A5.5 5.5 0 1 0 6.5 10.5C6.5 15.6 12 20 12 20Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                    <path d="M12 12.5A2 2 0 1 0 12 8.5a2 2 0 0 0 0 4Z" stroke="currentColor" stroke-width="1.8"/>
                </svg>
                @break
            @default
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M7 3v3M17 3v3M4.5 9h15" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M6.5 5.5h11A2.5 2.5 0 0 1 20 8v11.5A2.5 2.5 0 0 1 17.5 22h-11A2.5 2.5 0 0 1 4 19.5V8a2.5 2.5 0 0 1 2.5-2.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                </svg>
        @endswitch
    </div>

    <h3 class="text-lg font-bold text-coffee-900">{{ $feature['title'] }}</h3>
    <p class="mt-3 leading-7 text-coffee-700">{{ $feature['description'] }}</p>
</article>