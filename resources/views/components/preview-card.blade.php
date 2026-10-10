@props(['number', 'emoji', 'title', 'tagline', 'delay' => '0ms'])

<article
    style="animation-delay: {{ $delay }}"
    class="group relative flex flex-col overflow-hidden rounded-2xl border border-line bg-ink/40 p-6 backdrop-blur-sm transition duration-300 motion-safe:animate-rise hover:-translate-y-1 hover:border-blue/50 hover:bg-ink/60 lg:p-7"
>
    <div aria-hidden="true" class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-blue/70 to-transparent opacity-60 transition-opacity group-hover:opacity-100"></div>

    <div class="flex items-center justify-between">
        <span class="font-mono text-xs text-mute">Poll #{{ $number }}</span>
        <span class="rounded-full border border-line bg-paper/60 px-2.5 py-1 text-[0.7rem] font-semibold uppercase tracking-[0.14em] text-tint">Coming soon</span>
    </div>

    <h3 class="mt-6 flex items-center gap-3 text-xl font-bold tracking-tight text-fg lg:text-2xl">
        <span aria-hidden="true" class="text-3xl transition-transform duration-300 group-hover:scale-110 lg:text-4xl">{{ $emoji }}</span>
        {{ $title }}
    </h3>

    <p class="mt-3 text-base leading-relaxed text-body lg:text-lg">“{{ $tagline }}”</p>
</article>
