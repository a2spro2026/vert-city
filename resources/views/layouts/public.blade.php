<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta-description', 'Vertcity, promoteur immobilier de confiance. Découvrez nos résidences, appartements, maisons et chantiers.')">
    <title>@yield('title', 'Vertcity — Promotion immobilière')</title>
    <link rel="icon" href="{{ asset('images/vertcity-logo.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|outfit:400,500,600,700|noto-kufi-arabic:400,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f8f8f5] font-sans text-[#18251e] antialiased">
    <header class="header-public absolute inset-x-0 top-0 z-30 text-white">
        @php
            $navLinks = [
                ['route' => 'home', 'active' => 'home', 'label' => 'Accueil'],
                ['route' => 'public.projects.new', 'active' => ['public.projects.new', 'public.projects.show'], 'label' => 'Projets neufs'],
                ['route' => 'public.projects.construction', 'active' => ['public.projects.construction', 'public.construction-sites.*'], 'label' => 'Chantiers en cours'],
            ];
        @endphp

        <div class="mx-auto grid h-24 max-w-7xl grid-cols-[1fr_auto] items-center px-6 lg:grid-cols-[1fr_auto_1fr] lg:px-10">
            @include('layouts.partials.brand', ['tone' => 'light', 'size' => 'md', 'class' => 'justify-self-start'])

            <nav class="nav-center hidden items-center justify-center gap-2 lg:flex">
                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                        class="nav-link {{ request()->routeIs(...(array) $link['active']) ? 'is-active' : '' }}">{{ $link['label'] }}</a>
                @endforeach
            </nav>

            <div class="hidden items-center justify-self-end gap-5 lg:flex">
                @auth
                    <div class="flex items-center gap-2.5 text-sm">
                        <span class="avatar-glow grid h-10 w-10 place-items-center rounded-full bg-white text-xs font-bold text-[#153827]">{{ auth()->user()->initials }}</span>
                        <span class="font-medium glow-soft">{{ auth()->user()->name }}</span>
                    </div>
                    <a href="{{ route('admin.dashboard') }}" class="btn-admin">
                        <span class="admin-dot"></span>
                        Admin
                    </a>
                @else
                    <button type="button" class="btn-admin" data-login-open>
                        <span class="admin-dot"></span>
                        Admin
                    </button>
                @endauth
            </div>

            <details class="relative justify-self-end lg:hidden">
                <summary class="btn-glow-outline cursor-pointer list-none rounded-full border border-white/35 px-4 py-2.5 text-sm font-medium">Menu</summary>
                <nav class="absolute right-0 mt-3 flex w-72 flex-col gap-1.5 rounded-2xl border border-white/10 bg-[#10281d]/95 p-3 shadow-[0_20px_50px_-20px_rgba(0,0,0,0.7)] backdrop-blur-md">
                    @foreach ($navLinks as $link)
                        <a href="{{ route($link['route']) }}" class="nav-link-mobile rounded-xl px-4 py-3.5 text-[0.95rem] font-medium tracking-wide hover:bg-white/10">{{ $link['label'] }}</a>
                    @endforeach
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="btn-admin mt-2 justify-center">
                            <span class="admin-dot"></span>
                            Administration
                        </a>
                    @else
                        <button type="button" class="btn-admin mt-2 justify-center" data-login-open>
                            <span class="admin-dot"></span>
                            Administration
                        </button>
                    @endauth
                </nav>
            </details>
        </div>
    </header>

    <main>@yield('content')</main>

    <footer class="bg-[#10281d] text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 py-14 md:grid-cols-3 lg:px-10">
            <div>
                @include('layouts.partials.brand', ['tone' => 'light', 'size' => 'md', 'showTagline' => true])
                <p class="mt-5 max-w-sm text-sm leading-7 text-white/55">Des projets immobiliers pensés avec exigence, transparence et respect de votre cadre de vie.</p>
            </div>
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#b8dc79] glow-eyebrow">Navigation</p>
                <div class="mt-4 space-y-3 text-sm text-white/60">
                    <a href="{{ route('public.projects.new') }}" class="block hover:text-white">Projets neufs</a>
                    <a href="{{ route('public.projects.construction') }}" class="block hover:text-white">Chantiers en cours</a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="block hover:text-white">Espace administration</a>
                    @else
                        <button type="button" class="block hover:text-white" data-login-open>Espace administration</button>
                    @endauth
                </div>
            </div>
            <div class="md:text-right">
                <p lang="ar" dir="rtl" class="text-arabic glow-arabic text-2xl font-semibold">نبني اليوم مستقبل الغد</p>
                <p class="mt-3 text-sm text-white/45">Nous construisons aujourd’hui l’avenir de demain.</p>
            </div>
        </div>
        <div class="border-t border-white/10 px-6 py-5 text-center text-xs text-white/35">© {{ date('Y') }} Vertcity. Tous droits réservés.</div>
    </footer>

    @guest
        @include('layouts.partials.admin-login-panel')
        <script>
            (() => {
                const panel = document.getElementById('admin-login-panel');
                if (!panel) return;

                const open = () => {
                    if (typeof panel.showModal === 'function') {
                        panel.showModal();
                    } else {
                        panel.setAttribute('open', '');
                    }
                    panel.querySelector('#panel-login')?.focus();
                };

                const close = () => {
                    if (typeof panel.close === 'function') {
                        panel.close();
                    } else {
                        panel.removeAttribute('open');
                    }
                };

                document.querySelectorAll('[data-login-open]').forEach((button) => {
                    button.addEventListener('click', (event) => {
                        event.preventDefault();
                        open();
                    });
                });

                document.querySelectorAll('[data-login-close]').forEach((button) => {
                    button.addEventListener('click', close);
                });

                panel.addEventListener('click', (event) => {
                    if (event.target === panel) close();
                });

                @if ($errors->any() || session('open_login'))
                    open();
                @endif
            })();
        </script>
    @endguest
</body>
</html>
