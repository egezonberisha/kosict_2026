@props(['title' => 'Production Confessions'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-paper">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Anonymous confessions from developers who've seen things. Built live at KosICT 2026 with Laravel Cloud.">
        <meta name="theme-color" content="#070711">

        <title>{{ $title }} · KosICT 2026</title>

        <link rel="icon" href="{{ asset('images/laravel-cloud-mark.svg') }}" type="image/svg+xml">

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="relative min-h-screen overflow-x-hidden bg-paper font-sans text-body antialiased selection:bg-blue/40 selection:text-white">
        {{-- Ambient background --}}
        <div aria-hidden="true" class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
            <div class="bg-grid absolute inset-0"></div>
            <div class="absolute -top-1/3 left-1/2 h-[70vh] w-[90vw] -translate-x-1/2 rounded-full bg-blue-deep/25 blur-[120px] motion-safe:animate-drift"></div>
            <div class="absolute -bottom-1/4 -right-1/4 h-[50vh] w-[50vw] rounded-full bg-ink blur-[100px]"></div>
            <div class="absolute bottom-0 left-0 h-[30vh] w-[30vw] rounded-full bg-laravel/5 blur-[100px]"></div>
        </div>

        <div class="mx-auto flex min-h-screen max-w-7xl flex-col px-5 sm:px-8 lg:px-12">
            <header class="flex flex-wrap items-center justify-between gap-x-6 gap-y-4 border-b border-line/70 py-5 lg:py-6">
                <a href="{{ route('home') }}" class="flex items-center gap-4 rounded-md focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue">
                    <img src="{{ asset('images/kosict-logo.svg') }}" alt="KosICT" width="69" height="52" class="h-10 w-auto lg:h-12">
                    <span class="h-10 w-px bg-line" aria-hidden="true"></span>
                    <span class="leading-tight">
                        <span class="block text-base font-bold tracking-tight text-fg lg:text-lg">KosICT 2026</span>
                        <span class="block text-xs font-medium uppercase tracking-[0.18em] text-tint">15th edition</span>
                    </span>
                </a>

                <div class="flex flex-wrap items-center gap-3 sm:gap-5">
                    <p class="font-mono text-xs text-mute sm:text-sm">
                        <time datetime="2026-10-09">October 9–10, 2026</time> · Prishtina
                    </p>
                    <span class="inline-flex items-center gap-2 rounded-full border border-blue/40 bg-blue/10 px-3 py-1.5 text-xs font-semibold uppercase tracking-[0.12em] text-fg">
                        <img src="{{ asset('images/laravel-cloud-mark.svg') }}" alt="" width="14" height="14" class="size-3.5">
                        Laravel Cloud Live Demo
                    </span>
                </div>
            </header>

            <main class="flex flex-1 flex-col">
                {{ $slot }}
            </main>

            <footer class="flex flex-col items-center justify-between gap-3 border-t border-line/70 py-6 text-sm sm:flex-row">
                <p class="font-medium text-body">Built live at KosICT 2026</p>
                <a href="https://cloud.laravel.com" target="_blank" rel="noopener" class="group inline-flex items-center gap-2 rounded-md text-mute transition-colors hover:text-fg focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-blue">
                    <img src="{{ asset('images/laravel-cloud-mark.svg') }}" alt="" width="16" height="16" class="size-4 opacity-80 transition-opacity group-hover:opacity-100">
                    Powered by <span class="font-semibold text-fg underline decoration-blue/50 underline-offset-4 group-hover:decoration-blue">Laravel Cloud</span>
                </a>
            </footer>
        </div>
    </body>
</html>
