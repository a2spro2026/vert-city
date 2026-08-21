<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Administration') — Vertcity</title>
    <link rel="icon" href="{{ asset('images/vertcity-logo.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|outfit:400,500,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-shell min-h-screen font-sans text-slate-900">
    <div class="min-h-screen lg:grid lg:grid-cols-[288px_1fr]">
        <aside class="sidebar-panel relative text-white lg:sticky lg:top-0 lg:flex lg:h-screen lg:w-72 lg:flex-col">
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -top-24 -right-16 h-48 w-48 rounded-full bg-[#b8dc79]/15 blur-3xl"></div>
                <div class="absolute top-1/3 -left-10 h-40 w-40 rounded-full bg-amber-400/10 blur-3xl"></div>
                <div class="absolute bottom-20 right-0 h-36 w-36 rounded-full bg-sky-400/10 blur-3xl"></div>
            </div>

            <div class="relative z-10 shrink-0 border-b border-white/10 bg-[#071018]/35 backdrop-blur-md">
                <div class="flex items-center justify-between px-4 py-4 lg:block">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        <span class="brand-emblem brand-emblem--admin h-11 w-11 shrink-0">
                            <img src="{{ asset('images/vertcity-logo.png') }}" alt="Vertcity" class="h-full w-full object-contain" width="88" height="88">
                        </span>
                        <div>
                            <p class="font-display text-lg font-bold leading-tight tracking-[0.12em]">VERT<span class="text-[#b8dc79]">CITY</span></p>
                            <p class="text-[10px] leading-tight text-[#c9dfb0]/75">Construire aujourd'hui,<br>bâtir demain.</p>
                        </div>
                    </a>
                    <details class="relative lg:hidden">
                        <summary class="cursor-pointer list-none rounded-lg border border-white/15 px-3 py-2 text-sm">Menu</summary>
                        <nav class="absolute right-0 z-20 mt-3 max-h-[70vh] w-72 overflow-y-auto rounded-xl bg-[#10281d] p-3 shadow-2xl">
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

            <div class="relative z-10 hidden shrink-0 border-t border-white/10 bg-[#071018]/35 p-4 backdrop-blur-md lg:block">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-nav-item flex w-full items-center gap-3 rounded-xl border border-red-400/20 px-3 py-3 text-sm font-semibold text-red-200 transition hover:border-red-400/40 hover:bg-red-500/15 hover:text-white">
                        <span class="grid h-8 w-8 place-items-center rounded-lg bg-red-500/15">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        </span>
                        Se déconnecter
                    </button>
                </form>
            </div>
        </aside>

        <div class="lg:col-start-2">
            <header class="admin-topbar flex h-16 items-center justify-between px-6 lg:px-8">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-[#6f8f4f]">Espace interne</p>
                    <h1 class="font-display text-lg font-semibold text-[#153827]">@yield('page-title', 'Tableau de bord')</h1>
                </div>
                <div class="flex items-center gap-3">
                    <span class="hidden text-sm text-slate-500 md:block">{{ now()->format('d/m/Y') }}</span>
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-semibold text-[#153827]">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-[#6f8f4f]">{{ auth()->user()->role_label }}</p>
                    </div>
                    @if (auth()->user()->profile_photo_path)
                        <img src="{{ asset('storage/'.auth()->user()->profile_photo_path) }}" alt="" class="avatar-glow h-10 w-10 rounded-full object-cover">
                    @else
                        <div class="avatar-glow grid h-10 w-10 place-items-center rounded-full bg-[#153827] text-sm font-bold text-[#d7f0a4]">
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
