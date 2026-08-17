@extends('layouts.admin')

@section('title', 'Tableau de bord')
@section('page-title', 'Tableau de bord')

@section('content')
    <div class="mb-8">
        <h2 class="heading-section text-2xl">Bonjour, {{ explode(' ', auth()->user()->name)[0] }} 👋</h2>
        <p class="mt-2 text-slate-500">Voici un aperçu de l’activité de Vertcity.</p>
    </div>

    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ([
            ['label' => 'Projets', 'value' => $projectCount, 'note' => $projectCount ? 'Projet(s) enregistré(s)' : 'Aucun projet créé', 'color' => 'bg-emerald-50 text-emerald-700'],
            ['label' => 'Chantiers actifs', 'value' => $activeConstructionCount, 'note' => $activeConstructionCount ? 'Chantier(s) en réalisation' : 'Aucun chantier en cours', 'color' => 'bg-amber-50 text-amber-700'],
            ['label' => 'Factures en attente', 'value' => '0', 'note' => 'Aucune facture', 'color' => 'bg-blue-50 text-blue-700'],
            ['label' => 'Charges du mois', 'value' => '0 DA', 'note' => 'Aucune charge', 'color' => 'bg-rose-50 text-rose-700'],
        ] as $stat)
            <article class="card-luminous halo-light overflow-hidden rounded-2xl border border-slate-200/70 bg-white p-6">
                <div class="{{ $stat['color'] }} mb-6 inline-flex rounded-lg px-2.5 py-1 text-xs font-semibold">{{ $stat['label'] }}</div>
                <p class="font-display text-3xl font-semibold">{{ $stat['value'] }}</p>
                <p class="mt-2 text-sm text-slate-400">{{ $stat['note'] }}</p>
            </article>
        @endforeach
    </div>

    <div class="mt-7 grid gap-6 xl:grid-cols-[1.5fr_1fr]">
        <section class="card-luminous rounded-2xl border border-slate-200/70 bg-white p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-display font-semibold">Activité récente</h3>
                    <p class="mt-1 text-sm text-slate-400">Les dernières opérations apparaîtront ici.</p>
                </div>
            </div>
            <div class="mt-10 grid place-items-center rounded-xl border border-dashed border-slate-200 py-14 text-center">
                <div>
                    <div class="mx-auto mb-3 grid h-11 w-11 place-items-center rounded-full bg-slate-50 text-slate-400">↗</div>
                    <p class="text-sm font-medium text-slate-500">Aucune activité pour le moment</p>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden rounded-2xl bg-[#153827] p-7 text-white shadow-[0_20px_50px_-24px_rgba(16,40,29,0.85)]">
            <div class="pointer-events-none absolute inset-0 opacity-25 [background-image:radial-gradient(circle_at_85%_15%,#b8dc79_0,transparent_45%)]"></div>
            <p class="relative text-xs font-semibold uppercase tracking-[0.18em] text-[#a7d46f] glow-eyebrow">Démarrage rapide</p>
            <h3 class="heading-invert relative mt-4 text-xl">Votre espace est prêt.</h3>
            <p class="relative mt-3 text-sm leading-6 text-white/60">La prochaine étape consiste à créer le module Projets et à publier ses contenus sur le site externe.</p>
            <a href="{{ route('admin.projets.index') }}" class="btn-glow-primary relative mt-8 inline-flex rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-[#153827]">
                Accéder aux projets →
            </a>
        </section>
    </div>
@endsection
