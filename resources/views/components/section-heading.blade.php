@props(['eyebrow' => null, 'title', 'description' => null])

<div class="max-w-3xl">
    @if ($eyebrow)
        <span class="section-badge">{{ $eyebrow }}</span>
    @endif

    <h2 class="mt-4 font-display text-3xl font-extrabold tracking-tight text-coffee-900 sm:text-4xl">
        {{ $title }}
    </h2>

    @if ($description)
        <p class="mt-4 text-base leading-8 text-coffee-700 sm:text-lg">
            {{ $description }}
        </p>
    @endif
</div>