@props(['testimonial'])

<article class="glass-panel p-6">
    <p class="text-base leading-8 text-coffee-800">&ldquo;{{ $testimonial['quote'] }}&rdquo;</p>
    <p class="mt-5 text-sm font-bold uppercase tracking-[0.2em] text-coffee-500">{{ $testimonial['name'] }}</p>
</article>