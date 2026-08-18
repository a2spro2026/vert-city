@extends('layouts.admin')

@section('title', 'Tableau de bord')
@section('page-title', 'Tableau de bord')

@section('content')
    <div class="mb-3 flex items-center gap-3">
        <h2 class="text-xs font-bold uppercase tracking-[0.25em] text-slate-600 whitespace-nowrap">Cartes Analytiques</h2>
        <div class="h-px flex-1 bg-gradient-to-r from-orange-400/60 via-slate-300 to-transparent"></div>
    </div>

    <div class="mb-6 grid grid-cols-2 gap-2 md:grid-cols-3 xl:grid-cols-5">
        @foreach ($kpis as $kpi)
            <article class="relative overflow-hidden rounded-lg bg-gradient-to-br {{ $kpi['gradient'] }} p-2.5 shadow-md min-h-[82px]">
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                <div class="relative flex h-full flex-col">
                    <div class="mb-1.5 flex items-center justify-between">
                        <span class="rounded-md bg-white/20 p-1 text-white">
                            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $kpi['icon'] }}"/></svg>
                        </span>
                    </div>
                    <p class="text-[9px] font-semibold uppercase tracking-wide leading-tight text-white/80">{{ $kpi['label'] }}</p>
                    <p class="mt-auto pt-2.5 text-base font-bold tabular-nums leading-none tracking-tight text-white">{{ $kpi['value'] }}</p>
                </div>
            </article>
        @endforeach
    </div>

    <div class="space-y-6">
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
            @include('admin.partials.report-table', [
                'title' => '5 Derniers Bons Achats',
                'accent' => 'from-amber-500 via-orange-500 to-orange-700',
                'columns' => ['Date', 'Fournisseurs', 'BN N°', 'Qte', 'Montant Bon', 'Solde'],
                'rows' => $tables['bons_achats'],
            ])
            @include('admin.partials.report-table', [
                'title' => '5 Derniers Bons Ventes',
                'accent' => 'from-blue-600 via-blue-700 to-slate-800',
                'columns' => ['Date', 'Client', 'BN N°', 'Qte', 'Montant Bon', 'Solde'],
                'rows' => $tables['bons_ventes'],
            ])
        </div>
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
            @include('admin.partials.report-table', [
                'title' => '5 Derniers Bon Charge',
                'accent' => 'from-teal-600 via-cyan-700 to-slate-800',
                'columns' => ['Date', 'Désignation', 'Bénéficiaire', 'Régl', 'Date Décaiss'],
                'rows' => $tables['bons_charges'],
            ])
            @include('admin.partials.report-table', [
                'title' => '5 Régl à Décaisser — Semaine en cours',
                'accent' => 'from-rose-500 via-red-500 to-rose-800',
                'columns' => ['Type Rég', 'N°', 'Bnq', 'Tiré', 'Montant', 'Date Décaiss'],
                'rows' => $tables['reglements'],
            ])
        </div>
    </div>
@endsection
