<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Administration') — Vertcity</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|outfit:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f5f6f3] font-sans text-slate-900">
    <div class="min-h-screen lg:grid lg:grid-cols-[270px_1fr]">
        <aside class="bg-[#153827] text-white lg:fixed lg:inset-y-0 lg:w-[270px]">
            <div class="flex items-center justify-between px-6 py-6 lg:block">
                <a href="{{ route('admin.dashboard') }}" class="brand-mark font-display text-xl font-bold">VERT<span class="text-[#a7d46f] glow-eyebrow">CITY</span></a>
                <details class="relative lg:hidden">
                    <summary class="cursor-pointer list-none rounded-lg border border-white/15 px-3 py-2 text-sm">Menu</summary>
                    <nav class="absolute right-0 z-20 mt-3 w-64 rounded-xl bg-[#153827] p-3 shadow-2xl">
                        @include('layouts.partials.admin-navigation')
                    </nav>
                </details>
            </div>
            <div class="hidden px-4 lg:block">
                <p class="mb-3 px-3 text-[11px] font-semibold uppercase tracking-[0.2em] text-white/35">Administration</p>
                <nav>@include('layouts.partials.admin-navigation')</nav>
            </div>
        </aside>

        <div class="lg:col-start-2">
            <header class="flex h-20 items-center justify-between border-b border-slate-200/80 bg-white px-6 shadow-[0_10px_30px_-24px_rgba(16,40,29,0.55)] lg:px-10">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#70a744]">Espace interne</p>
                    <h1 class="heading-section mt-1 text-lg">@yield('page-title', 'Tableau de bord')</h1>
                </div>
                <div class="flex items-center gap-3">
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-emerald-600">{{ auth()->user()->role_label }}</p>
                    </div>
                    @if (auth()->user()->profile_photo_path)
                        <img src="{{ asset('storage/'.auth()->user()->profile_photo_path) }}" alt="" class="h-10 w-10 rounded-full object-cover shadow-[0_6px_18px_-6px_rgba(16,40,29,0.6)]">
                    @else
                        <div class="grid h-10 w-10 place-items-center rounded-full bg-[#e7f0df] text-sm font-bold text-[#376127] shadow-[0_6px_18px_-8px_rgba(58,110,62,0.8),inset_0_1px_0_rgba(255,255,255,0.8)]">
                            {{ auth()->user()->initials }}
                        </div>
                    @endif
                </div>
            </header>

            <main class="p-6 lg:p-10">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
