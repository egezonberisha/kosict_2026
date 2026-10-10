<x-layouts.app>
    <section aria-labelledby="hero-title" class="grid items-center gap-10 py-12 sm:py-16 lg:grid-cols-12 lg:gap-12 lg:py-12 2xl:py-16">
        <div class="lg:col-span-8 motion-safe:animate-rise">
            <p class="flex flex-wrap gap-x-3 text-sm font-semibold uppercase tracking-[0.28em] text-tint">
                <span>Adapt.</span><span>Protect.</span><span class="text-blue">Build.</span>
            </p>

            <h1 id="hero-title" class="mt-5 font-extrabold tracking-[-0.035em] text-fg">
                <span class="flex items-center gap-3 text-2xl font-bold tracking-tight text-blue sm:text-3xl lg:text-4xl">
                    <img src="{{ asset('images/laravel-cloud-mark.svg') }}" alt="" width="32" height="32" class="size-6 sm:size-7 lg:size-8">
                    Laravel Cloud:
                </span>
                <span class="text-gradient mt-3 block text-balance text-[2.75rem] leading-[0.95] motion-safe:animate-shimmer sm:text-6xl lg:text-[3.5rem] xl:text-[4rem]">From Code to Production</span>
                <span class="mt-3 block text-balance text-2xl font-semibold leading-tight tracking-tight text-tint sm:text-3xl lg:text-[2rem] xl:text-4xl">Without the Infrastructure Headache</span>
            </h1>

            <p class="mt-6 max-w-2xl text-lg text-body sm:text-xl lg:text-2xl">
                Build it. Push it. Deploy it.
                <span class="block font-semibold text-fg">Let Laravel Cloud handle the rest.</span>
            </p>
        </div>

        <div class="lg:col-span-4 motion-safe:animate-rise" style="animation-delay: 150ms">
            <div role="status" class="relative overflow-hidden rounded-2xl border border-line bg-ink/50 p-6 shadow-2xl shadow-blue-deep/20 backdrop-blur-sm lg:p-7">
                <div aria-hidden="true" class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-blue to-transparent"></div>

                <p class="inline-flex items-center gap-3 text-lg font-semibold text-fg lg:text-xl">
                    <span class="relative flex size-3" aria-hidden="true">
                        <span class="absolute inline-flex size-full rounded-full bg-blue opacity-75 motion-safe:animate-ping"></span>
                        <span class="relative inline-flex size-3 rounded-full bg-blue"></span>
                    </span>
                    Live demo starting soon 🚀
                </p>

                <p class="mt-4 text-base leading-relaxed text-body">
                    We're about to build this application and deploy it to production using Laravel Cloud.
                </p>

                <div aria-hidden="true" class="mt-5 rounded-xl border border-line bg-paper/80 p-4 font-mono text-sm leading-7">
                    <p><span class="text-blue">~/kosict_2026</span> <span class="text-mute">on</span> <span class="text-tint">main</span></p>
                    <p class="text-fg"><span class="text-laravel">❯</span> git push origin main</p>
                    <p class="text-mute">Deploying to Laravel Cloud<span class="motion-safe:animate-pulse">…</span></p>
                </div>
            </div>
        </div>
    </section>

    <section aria-labelledby="preview-title" class="pb-12 lg:pb-14">
        <div class="flex items-center gap-4">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-mute">Coming up in the live demo</p>
            <span aria-hidden="true" class="hidden h-px flex-1 bg-gradient-to-r from-line to-transparent sm:block"></span>
        </div>

        <div class="mt-3 flex flex-col gap-x-6 gap-y-2 lg:flex-row lg:items-baseline">
            <h2 id="preview-title" class="text-3xl font-extrabold tracking-[-0.03em] text-fg sm:text-4xl">
                Production <span class="whitespace-nowrap">Confessions <span aria-hidden="true">🔥</span></span>
            </h2>
            <p class="text-base text-body sm:text-lg">Anonymous confessions from developers who've seen things.</p>
        </div>

        <div class="mt-6 grid gap-5 md:grid-cols-3 lg:gap-6">
            <x-preview-card number="01" emoji="💾" title="Database Backups" tagline="Automated, tested... or thoughts and prayers?" delay="250ms" />
            <x-preview-card number="02" emoji="🚀" title="Deploy Strategies" tagline="Git push, SSH, or FTP and vibes?" delay="350ms" />
            <x-preview-card number="03" emoji="💀" title="Production Nightmares" tagline="It always starts with a quick Slack message." delay="450ms" />
        </div>
    </section>
</x-layouts.app>
