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
<body class="min-h-screen bg-slate-100 font-sans text-slate-900">
    <div class="min-h-screen lg:grid lg:grid-cols-[288px_1fr]">
        <aside class="sidebar-panel relative text-white lg:sticky lg:top-0 lg:flex lg:h-screen lg:w-72 lg:flex-col">
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -top-20 -right-20 h-40 w-40 rounded-full bg-orange-500/10 blur-3xl"></div>
                <div class="absolute bottom-32 -left-10 h-32 w-32 rounded-full bg-blue-500/10 blur-3xl"></div>
            </div>

            <div class="relative z-10 shrink-0 border-b border-white/10 bg-slate-900/40 backdrop-blur-md">
                <div class="flex items-center justify-between px-4 py-4 lg:block">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        <div class="sidebar-logo-glow grid h-10 w-10 place-items-center rounded-lg bg-orange-500 font-display text-lg font-bold">VC</div>
                        <div>
                            <p class="font-display text-lg font-bold leading-tight">Vertcity</p>
                            <p class="text-[10px] leading-tight text-blue-200/70">Construire aujourd'hui,<br>bâtir demain.</p>
                        </div>
                    </a>
                    <details class="relative lg:hidden">
                        <summary class="cursor-pointer list-none rounded-lg border border-white/15 px-3 py-2 text-sm">Menu</summary>
                        <nav class="absolute right-0 z-20 mt-3 max-h-[70vh] w-72 overflow-y-auto rounded-xl bg-slate-900 p-3 shadow-2xl">
                            @include('layouts.partials.admin-navigation')
                            <form method="POST" action="{{ route('admin.logout') }}" class="mt-4 border-t border-white/10 pt-3">
                                @csrf
                                <button type="submit" class="flex w-full items-center gap-3 rounded-xl border border-red-500/20 px-3 py-3 text-sm font-semibold text-red-200">Se déconnecter</button>
                            </form>
                        </nav>
                    </details>
                </div>
            </div>

            <div class="relative z-10 hidden min-h-0 flex-1 overflow-y-auto p-3 lg:block">
                @include('layouts.partials.admin-navigation')
            </div>

            <div class="relative z-10 hidden shrink-0 border-t border-white/10 bg-slate-900/40 p-4 backdrop-blur-md lg:block">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-nav-item flex w-full items-center gap-3 rounded-xl border border-red-500/20 px-3 py-3 text-sm font-semibold text-red-200 transition hover:border-red-400/40 hover:bg-red-500/20 hover:text-white">
                        <span class="grid h-8 w-8 place-items-center rounded-lg bg-red-500/15">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </span>
                        Se déconnecter
                    </button>
                </form>
            </div>
        </aside>

        <div class="lg:col-start-2">
            <header class="flex h-16 items-center justify-between border-b border-slate-200/80 bg-white/90 px-6 shadow-sm backdrop-blur lg:px-8">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">Espace interne</p>
                    <h1 class="font-display text-lg font-semibold text-slate-800">@yield('page-title', 'Tableau de bord')</h1>
                </div>
                <div class="flex items-center gap-3">
                    <span class="hidden text-sm text-slate-500 md:block">{{ now()->format('d/m/Y') }}</span>
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-slate-500">{{ auth()->user()->role_label }}</p>
                    </div>
                    @if (auth()->user()->profile_photo_path)
                        <img src="{{ asset('storage/'.auth()->user()->profile_photo_path) }}" alt="" class="h-10 w-10 rounded-full object-cover">
                    @else
                        <div class="grid h-10 w-10 place-items-center rounded-full bg-blue-600 text-sm font-bold text-white">
                            {{ auth()->user()->initials }}
                        </div>
                    @endif
                </div>
            </header>

            <main class="p-4 lg:p-6">
                @if (session('success'))
                    <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="mb-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">{{ session('error') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
