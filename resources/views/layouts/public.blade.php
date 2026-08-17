<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta-description', 'Vertcity, promoteur immobilier de confiance. Découvrez nos résidences, appartements, maisons et chantiers.')">
    <title>@yield('title', 'Vertcity — Promotion immobilière')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|outfit:400,500,600,700|noto-kufi-arabic:400,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8f8f5] font-sans text-[#18251e] antialiased">
    <header class="absolute inset-x-0 top-0 z-30 border-b border-white/15 bg-[#10281d]/20 text-white backdrop-blur-sm">
        @php
            $navLinks = [
                ['route' => 'home', 'active' => 'home', 'label' => 'Accueil'],
                ['route' => 'public.projects.new', 'active' => ['public.projects.new', 'public.projects.show'], 'label' => 'Projets neufs'],
                ['route' => 'public.projects.construction', 'active' => ['public.projects.construction', 'public.construction-sites.*'], 'label' => 'Chantiers en cours'],
            ];
        @endphp

        <div class="mx-auto grid h-20 max-w-7xl grid-cols-[1fr_auto] items-center px-6 lg:grid-cols-[1fr_auto_1fr] lg:px-10">
            <a href="{{ route('home') }}" class="brand-mark font-display justify-self-start text-xl font-bold">VERT<span class="text-[#b8dc79] glow-eyebrow">CITY</span></a>

            <nav class="hidden items-center justify-center gap-1 lg:flex">
                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                        class="nav-link {{ request()->routeIs(...(array) $link['active']) ? 'is-active' : '' }}">{{ $link['label'] }}</a>
                @endforeach
            </nav>

            <div class="hidden items-center justify-self-end gap-5 lg:flex">
                @auth
                    <div class="flex items-center gap-2.5 text-sm">
                        <span class="avatar-glow grid h-9 w-9 place-items-center rounded-full bg-white text-xs font-bold text-[#153827]">{{ auth()->user()->initials }}</span>
                        <span class="font-medium glow-soft">{{ auth()->user()->name }}</span>
                    </div>
                @endauth
                <a href="{{ auth()->check() ? route('admin.dashboard') : route('login') }}" class="btn-admin">
                    <span class="admin-dot"></span>
                    Admin
                </a>
            </div>

            <details class="relative justify-self-end lg:hidden">
                <summary class="btn-glow-outline cursor-pointer list-none rounded-lg border border-white/30 px-3 py-2 text-sm font-medium">Menu</summary>
                <nav class="absolute right-0 mt-3 flex w-64 flex-col gap-1 rounded-xl bg-[#153827] p-3 shadow-2xl">
                    @foreach ($navLinks as $link)
                        <a href="{{ route($link['route']) }}" class="rounded-lg px-4 py-3 text-sm font-medium hover:bg-white/10">{{ $link['label'] }}</a>
                    @endforeach
                    <a href="{{ auth()->check() ? route('admin.dashboard') : route('login') }}" class="btn-admin mt-2 justify-center">
                        <span class="admin-dot"></span>
                        Administration
                    </a>
                </nav>
            </details>
        </div>
    </header>

    <main>@yield('content')</main>

    <footer class="bg-[#10281d] text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-3 lg:px-10">
            <div>
                <p class="brand-mark font-display text-xl font-bold">VERT<span class="text-[#b8dc79] glow-eyebrow">CITY</span></p>
                <p class="mt-4 max-w-sm text-sm leading-7 text-white/55">Des projets immobiliers pensés avec exigence, transparence et respect de votre cadre de vie.</p>
            </div>
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#b8dc79] glow-eyebrow">Navigation</p>
                <div class="mt-4 space-y-3 text-sm text-white/60">
                    <a href="{{ route('public.projects.new') }}" class="block hover:text-white">Projets neufs</a>
                    <a href="{{ route('public.projects.construction') }}" class="block hover:text-white">Chantiers en cours</a>
                    <a href="{{ route('login') }}" class="block hover:text-white">Espace administration</a>
                </div>
            </div>
            <div class="md:text-right">
                <p lang="ar" dir="rtl" class="text-arabic glow-arabic text-2xl font-semibold">نبني اليوم مستقبل الغد</p>
                <p class="mt-3 text-sm text-white/45">Nous construisons aujourd’hui l’avenir de demain.</p>
            </div>
        </div>
        <div class="border-t border-white/10 px-6 py-5 text-center text-xs text-white/35">© {{ date('Y') }} Vertcity. Tous droits réservés.</div>
    </footer>
</body>
</html>
