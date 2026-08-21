<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion — Vertcity</title>
    <link rel="icon" href="{{ asset('images/vertcity-logo.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|outfit:400,500,600,700|noto-kufi-arabic:400,600,700" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f4f5f0] font-sans text-slate-900">
    <main class="grid min-h-screen lg:grid-cols-2">
        <section class="relative hidden overflow-hidden bg-[#173b2a] lg:flex lg:flex-col lg:justify-between lg:p-14">
            <div class="absolute inset-0 opacity-20 [background-image:radial-gradient(circle_at_20%_20%,#9dcc63_0,transparent_35%),radial-gradient(circle_at_80%_80%,#58a777_0,transparent_40%)]"></div>
            @include('layouts.partials.brand', ['tone' => 'light', 'size' => 'lg', 'showTagline' => true, 'class' => 'relative'])
            <div class="relative max-w-lg">
                <p class="mb-5 text-sm font-semibold uppercase tracking-[0.25em] text-[#a7d46f] glow-eyebrow">Espace de gestion</p>
                <h1 class="heading-hero text-5xl leading-tight">Pilotez vos projets immobiliers en toute sérénité.</h1>
                <p class="mt-6 text-lg leading-8 text-white/70 glow-soft">Une vue claire sur vos chantiers, fournisseurs, factures et charges.</p>
            </div>
            <p class="relative text-sm text-white/40">© {{ date('Y') }} Vertcity</p>
        </section>

        <section class="flex items-center justify-center px-6 py-12 sm:px-12">
            <div class="w-full max-w-md">
                @include('layouts.partials.brand', ['tone' => 'dark', 'size' => 'md', 'class' => 'mb-14 lg:hidden'])
                <div class="mb-9">
                    <div class="panel-luminous mb-5 inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                        <span class="h-2 w-2 rounded-full bg-emerald-500 shadow-[0_0_10px_2px_rgba(16,185,129,0.6)]"></span>
                        Statut du système : opérationnel
                    </div>
                    <h2 class="heading-section text-3xl">Bienvenue</h2>
                    <p class="mt-2 text-slate-500">Connectez-vous à votre tableau de bord.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="role" class="mb-2 block text-sm font-semibold text-slate-700">Statut</label>
                        <select id="role" name="role" required
                            class="field-glow w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 outline-none focus:border-[#70a744]">
                            @foreach (\App\Models\User::ROLES as $value => $label)
                                <option value="{{ $value }}" @selected(old('role', 'manager') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="login" class="mb-2 block text-sm font-semibold text-slate-700">Login</label>
                        <input id="login" name="login" type="text" value="{{ old('login') }}" required autofocus autocomplete="username"
                            class="field-glow w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 outline-none focus:border-[#70a744]"
                            placeholder="Votre identifiant">
                    </div>
                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Mot de passe</label>
                        <input id="password" name="password" type="password" required autocomplete="current-password"
                            class="field-glow w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 outline-none focus:border-[#70a744]"
                            placeholder="••••••••">
                    </div>
                    <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-600">
                        <input name="remember" type="checkbox" class="h-4 w-4 rounded border-slate-300 accent-[#58883a]">
                        Garder ma session ouverte
                    </label>
                    <button type="submit" class="btn-glow-dark w-full rounded-xl bg-[#173b2a] px-5 py-3.5 font-semibold text-white transition hover:bg-[#214f39]">
                        Accéder au tableau de bord
                    </button>
                </form>
                <a href="/" class="mt-8 block text-center text-sm font-medium text-slate-500 hover:text-[#173b2a]">← Retour au site</a>
            </div>
        </section>
    </main>
</body>
</html>
