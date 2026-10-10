@props(['messages', 'messageCount', 'databaseName'])

<section aria-labelledby="mysql-demo-title" class="pb-12 lg:pb-14">
    <div class="flex flex-wrap items-center gap-4">
        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-mute">Live database demo</p>
        <span aria-hidden="true" class="hidden h-px flex-1 bg-gradient-to-r from-line to-transparent sm:block"></span>
        <p class="inline-flex items-center gap-2 rounded-full border border-emerald-400/30 bg-emerald-400/10 px-3 py-1.5 font-mono text-xs text-emerald-300">
            <span class="size-2 rounded-full bg-emerald-400" aria-hidden="true"></span>
            Connected to {{ $databaseName }} · {{ trans_choice(':count row|:count rows', $messageCount) }}
        </p>
    </div>

    <div class="mt-6 grid gap-5 lg:grid-cols-12 lg:gap-6">
        <div class="relative overflow-hidden rounded-2xl border border-line bg-ink/50 p-6 backdrop-blur-sm lg:col-span-5 lg:p-7">
            <div aria-hidden="true" class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-blue to-transparent"></div>

            <h2 id="mysql-demo-title" class="text-2xl font-bold tracking-tight text-fg">Write to the database</h2>
            <p class="mt-2 text-base text-body">Every message is a real row, written and read back from the database.</p>

            <form method="POST" action="{{ route('demo-messages.store') }}" class="mt-6">
                @csrf

                <label for="message" class="text-sm font-semibold text-tint">Your message</label>
                <div class="mt-2 flex flex-col gap-3 sm:flex-row">
                    <input
                        id="message"
                        name="message"
                        type="text"
                        value="{{ old('message') }}"
                        maxlength="255"
                        required
                        autocomplete="off"
                        placeholder="Hello from KosICT 2026 👋"
                        @error('message') aria-invalid="true" aria-describedby="message-error" @enderror
                        class="min-w-0 flex-1 rounded-xl border border-line bg-paper/80 px-4 py-3 text-base text-fg placeholder:text-mute focus:border-blue focus:outline-none focus:ring-2 focus:ring-blue/40"
                    >
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-dark px-5 py-3 text-base font-semibold text-white transition-colors hover:bg-blue focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue">
                        Save to MySQL
                    </button>
                </div>

                @error('message')
                    <p id="message-error" class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror

                @if (session('savedMessageId'))
                    <p role="status" class="mt-3 font-mono text-sm text-emerald-300">
                        ✓ Saved row #{{ session('savedMessageId') }} to {{ $databaseName }}
                    </p>
                @endif
            </form>
        </div>

        <div class="rounded-2xl border border-line bg-ink/30 p-6 backdrop-blur-sm lg:col-span-7 lg:p-7">
            <h3 class="text-sm font-semibold uppercase tracking-[0.18em] text-mute">Latest messages</h3>

            @if ($messages->isEmpty())
                <p class="mt-6 text-base text-body">No messages yet. Be the first to write to the database.</p>
            @else
                <ol class="mt-4 divide-y divide-line/70">
                    @foreach ($messages as $demoMessage)
                        <li @class([
                            'flex flex-col gap-1 py-3 sm:flex-row sm:items-baseline sm:justify-between sm:gap-4',
                            'motion-safe:animate-rise' => session('savedMessageId') === $demoMessage->id,
                        ])>
                            <p @class([
                                'min-w-0 break-words text-base',
                                'font-semibold text-fg' => session('savedMessageId') === $demoMessage->id,
                                'text-body' => session('savedMessageId') !== $demoMessage->id,
                            ])>{{ $demoMessage->message }}</p>
                            <p class="shrink-0 font-mono text-xs text-mute">
                                #{{ $demoMessage->id }} · <time datetime="{{ $demoMessage->created_at->toIso8601String() }}">{{ $demoMessage->created_at->diffForHumans() }}</time>
                            </p>
                        </li>
                    @endforeach
                </ol>
            @endif
        </div>
    </div>
</section>
