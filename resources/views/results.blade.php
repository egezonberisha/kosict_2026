<x-layouts.app title="Results">
    <section aria-labelledby="results-title" class="py-12 lg:py-14">
        <div class="flex items-center gap-4">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-mute">Live results</p>
            <span aria-hidden="true" class="hidden h-px flex-1 bg-gradient-to-r from-line to-transparent sm:block"></span>
            <p class="font-mono text-sm text-tint">{{ trans_choice(':count confession|:count confessions', $totalResponses) }}</p>
        </div>

        <h1 id="results-title" class="mt-3 text-4xl font-extrabold tracking-[-0.03em] text-fg sm:text-5xl">
            Production <span class="whitespace-nowrap">Confessions <span aria-hidden="true">🔥</span></span>
        </h1>

        @if (session('voted'))
            <p role="status" class="mt-4 font-mono text-sm text-emerald-300">✓ Thanks! Your confessions are saved.</p>
        @endif

        <div class="mt-8 grid gap-5 lg:grid-cols-3 lg:gap-6">
            @foreach ($results as $result)
                <article class="rounded-2xl border border-line bg-ink/40 p-6 backdrop-blur-sm lg:p-7">
                    <h2 class="text-xl font-bold tracking-tight text-fg">{{ $result['question'] }}</h2>

                    <ul class="mt-5 flex flex-col gap-4">
                        @foreach ($result['answers'] as $number => $answer)
                            @php($count = $result['counts'][$number] ?? 0)
                            @php($percentage = $totalResponses > 0 ? round($count / $totalResponses * 100) : 0)
                            <li>
                                <div class="flex items-baseline justify-between gap-3 text-base">
                                    <span class="text-body">{{ $answer }}</span>
                                    <span class="shrink-0 font-mono text-sm text-fg">{{ $percentage }}% <span class="text-mute">({{ $count }})</span></span>
                                </div>
                                <div class="mt-2 h-2 overflow-hidden rounded-full bg-paper/80" aria-hidden="true">
                                    <div class="h-full rounded-full bg-gradient-to-r from-blue-deep to-blue" style="width: {{ $percentage }}%"></div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>

        <a href="{{ route('home') }}" class="mt-8 inline-block text-sm text-mute underline decoration-line underline-offset-4 hover:text-fg">← Back to the poll</a>
    </section>
</x-layouts.app>
