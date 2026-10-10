<x-layouts.app>
    <section aria-labelledby="hero-title" class="grid items-center gap-10 py-12 sm:py-16 lg:grid-cols-12 lg:gap-12 lg:py-14 2xl:py-20">
        <div class="lg:col-span-7 motion-safe:animate-rise">
            <p class="flex flex-wrap gap-x-3 text-sm font-semibold uppercase tracking-[0.28em] text-tint">
                <span>Adapt.</span><span>Protect.</span><span class="text-blue">Build.</span>
            </p>

            <h1 id="hero-title" class="mt-5 text-5xl font-extrabold leading-[0.95] tracking-[-0.035em] text-fg sm:text-6xl lg:text-7xl 2xl:text-8xl">
                <span class="text-gradient motion-safe:animate-shimmer">Production</span>
                <span class="whitespace-nowrap"><span class="text-gradient motion-safe:animate-shimmer">Confessions</span> <span aria-hidden="true">🔥</span></span>
            </h1>

            <p class="mt-6 max-w-xl text-lg text-body sm:text-xl lg:text-2xl">
                Anonymous confessions from developers who've seen things.
            </p>
        </div>

        <div class="lg:col-span-5 motion-safe:animate-rise" style="animation-delay: 150ms">
            <div role="status" class="relative overflow-hidden rounded-2xl border border-line bg-ink/50 p-6 shadow-2xl shadow-blue-deep/20 backdrop-blur-sm lg:p-8">
                <div aria-hidden="true" class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-blue to-transparent"></div>

                <p class="inline-flex items-center gap-3 text-lg font-semibold text-fg lg:text-xl">
                    <span class="relative flex size-3" aria-hidden="true">
                        <span class="absolute inline-flex size-full rounded-full bg-blue opacity-75 motion-safe:animate-ping"></span>
                        <span class="relative inline-flex size-3 rounded-full bg-blue"></span>
                    </span>
                    Live demo starting soon 🚀
                </p>

                <p class="mt-4 text-base leading-relaxed text-body lg:text-lg">
                    We're about to build this application and deploy it to production using Laravel Cloud.
                </p>

                <div aria-hidden="true" class="mt-6 rounded-xl border border-line bg-paper/80 p-4 font-mono text-sm leading-7">
                    <p><span class="text-blue">~/kosict_2026</span> <span class="text-mute">on</span> <span class="text-tint">main</span></p>
                    <p class="text-fg"><span class="text-laravel">❯</span> git push origin main</p>
                    <p class="text-mute">Deploying to Laravel Cloud<span class="motion-safe:animate-pulse">…</span></p>
                </div>
            </div>
        </div>
    </section>

    <section aria-labelledby="preview-title" class="pb-12 lg:pb-14">
        <div class="flex items-end justify-between gap-4">
            <h2 id="preview-title" class="text-sm font-semibold uppercase tracking-[0.24em] text-mute">
                Coming up in the live demo
            </h2>
            <span aria-hidden="true" class="hidden h-px flex-1 bg-gradient-to-r from-line to-transparent sm:block"></span>
        </div>

        <div class="mt-6 grid gap-5 md:grid-cols-3 lg:gap-6">
            <x-preview-card number="01" emoji="💾" title="Database Backups" tagline="Automated, tested... or thoughts and prayers?" delay="250ms" />
            <x-preview-card number="02" emoji="🚀" title="Deploy Strategies" tagline="Git push, SSH, or FTP and vibes?" delay="350ms" />
            <x-preview-card number="03" emoji="💀" title="Production Nightmares" tagline="It always starts with a quick Slack message." delay="450ms" />
        </div>
    </section>
</x-layouts.app>
