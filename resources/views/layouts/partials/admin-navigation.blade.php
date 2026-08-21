@php
    $icons = [
        'dashboard' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
        'truck' => 'M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0zM13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10m10 0h6m-6 0a2 2 0 104 0m-4 0H9m10 0h1a1 1 0 001-1v-3.382a1 1 0 00-.553-.894l-2-1A1 1 0 0017.382 10H15',
        'package' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
        'file' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
        'hardhat' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
        'landmark' => 'M3 21h18M9 8h6m-9 4h12M4 21V10l8-6 8 6v11',
        'users' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
        'building' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5',
        'settings' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
        'contact' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
        'clipboard' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
        'banknote' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z',
        'scale' => 'M12 3v17m0-17L7 8m5-5l5 5M5 21h14',
        'scroll' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2',
        'boxes' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
        'arrows' => 'M7 16V4m0 0L3 8m4-4l4 4m6 4v12m0 0l4-4m-4 4l-4-4',
        'archive' => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4',
        'map' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
        'check' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        'trend' => 'M13 17h8m0 0V9m0 8l-8-8-4 4-6-6',
        'wallet' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z',
        'coins' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        'vault' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z',
        'calendar' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
        'user-cog' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
        'plus' => 'M12 4v16m8-8H4',
        'warehouse' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z',
        'receipt' => 'M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z',
        'list' => 'M4 6h16M4 10h16M4 14h16M4 18h16',
    ];

    $dashboardActive = request()->routeIs('admin.dashboard');

    $groups = [
        [
            'id' => 'fournisseurs',
            'label' => 'Fournisseur',
            'icon' => 'truck',
            'accent' => 'from-amber-400/20 to-orange-500/10',
            'children' => [
                ['route' => 'admin.fournisseurs.fiches', 'label' => 'Fiche Fournisseur', 'icon' => 'contact'],
                ['route' => 'admin.fournisseurs.bons-achats', 'label' => 'Bon Achats', 'icon' => 'clipboard'],
                ['route' => 'admin.fournisseurs.bons-commande', 'label' => 'Bon de Commande', 'icon' => 'check'],
                ['route' => 'admin.fournisseurs.reglements', 'label' => 'Règlement Achats', 'icon' => 'banknote'],
                ['route' => 'admin.fournisseurs.balance', 'label' => 'Balance', 'icon' => 'scale'],
                ['route' => 'admin.fournisseurs.releve', 'label' => 'Relevé Compte', 'icon' => 'scroll'],
            ],
        ],
        [
            'id' => 'stock',
            'label' => 'Stock',
            'icon' => 'package',
            'accent' => 'from-emerald-400/20 to-teal-600/10',
            'children' => [
                ['route' => 'admin.stock.produits', 'label' => 'Fiche Produit', 'icon' => 'boxes'],
                ['route' => 'admin.stock.mouvements', 'label' => 'Mouvement Stock', 'icon' => 'arrows'],
                ['route' => 'admin.stock.fiscal', 'label' => 'Stock Fiscale', 'icon' => 'archive'],
            ],
        ],
        [
            'id' => 'facturation',
            'label' => 'Facturation',
            'icon' => 'file',
            'accent' => 'from-sky-400/15 to-cyan-700/10',
            'children' => [
                ['route' => 'admin.facturation.depot-a', 'label' => 'Dépôt A', 'icon' => 'warehouse'],
                ['route' => 'admin.facturation.depot-b', 'label' => 'Dépôt B', 'icon' => 'warehouse'],
                ['route' => 'admin.facturation.depot-c', 'label' => 'Dépôt C', 'icon' => 'warehouse'],
                ['route' => 'admin.facturation.factures-ventes', 'label' => 'Facture Ventes', 'icon' => 'receipt'],
                ['route' => 'admin.facturation.reglements', 'label' => 'Règlements Factures Ventes', 'icon' => 'wallet'],
                ['route' => 'admin.facturation.balance', 'label' => 'Balance', 'icon' => 'scale'],
            ],
        ],
        [
            'id' => 'chantiers',
            'label' => 'Chantiers',
            'icon' => 'hardhat',
            'accent' => 'from-[#b8dc79]/25 to-lime-700/10',
            'children' => [
                ['route' => 'admin.chantiers.index', 'active' => ['admin.chantiers.index', 'admin.chantiers.create', 'admin.chantiers.edit'], 'label' => 'Carte Chantiers', 'icon' => 'map'],
                ['route' => 'admin.chantiers.devis', 'label' => 'Devis', 'icon' => 'file'],
                ['route' => 'admin.chantiers.bons-execution', 'label' => "Bon D'Execution", 'icon' => 'check'],
                ['route' => 'admin.chantiers.suivi-depenses', 'label' => 'Suivi Dépenses', 'icon' => 'trend'],
            ],
        ],
        [
            'id' => 'monetaire',
            'label' => 'Suivi Monétaire',
            'icon' => 'landmark',
            'accent' => 'from-amber-300/20 to-yellow-700/10',
            'children' => [
                ['route' => 'admin.monetaire.transactions', 'label' => 'Transaction et Charges', 'icon' => 'arrows'],
                ['route' => 'admin.monetaire.charges', 'label' => 'Charge', 'icon' => 'wallet'],
                ['route' => 'admin.monetaire.salaires', 'label' => 'Salaire', 'icon' => 'coins'],
                ['route' => 'admin.monetaire.tresorerie', 'label' => 'Trésorerie', 'icon' => 'vault'],
            ],
        ],
        [
            'id' => 'personnel',
            'label' => 'Personnel',
            'icon' => 'users',
            'accent' => 'from-teal-400/15 to-emerald-800/10',
            'children' => [
                ['route' => 'admin.personnel.fiches', 'label' => 'Fiche Personnel', 'icon' => 'contact'],
                ['route' => 'admin.personnel.etat-paiement', 'label' => 'État Paiement', 'icon' => 'calendar'],
            ],
        ],
        [
            'id' => 'projets',
            'label' => 'Projets',
            'icon' => 'building',
            'accent' => 'from-lime-400/20 to-emerald-700/10',
            'children' => [
                ['route' => 'admin.projets.index', 'active' => ['admin.projets.index', 'admin.projets.edit'], 'label' => 'Liste des projets', 'icon' => 'list'],
                ['route' => 'admin.projets.create', 'label' => 'Nouveau projet', 'icon' => 'plus'],
            ],
        ],
        [
            'id' => 'configuration',
            'label' => 'Configuration',
            'icon' => 'settings',
            'accent' => 'from-white/10 to-[#153827]/20',
            'children' => [
                ['route' => 'admin.configuration.utilisateurs', 'label' => 'Utilisateur', 'icon' => 'user-cog'],
                ['route' => 'admin.configuration.parametres', 'label' => 'Paramètres', 'icon' => 'settings'],
            ],
        ],
    ];
@endphp

@php
    $renderIcon = function (string $name, string $class = 'h-4 w-4') use ($icons) {
        $path = $icons[$name] ?? $icons['file'];

        return '<svg class="'.$class.' shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="'.$path.'"/></svg>';
    };
@endphp

<a href="{{ route('admin.dashboard') }}"
    class="sidebar-nav-item relative mb-2 flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold transition {{ $dashboardActive ? 'sidebar-nav-active text-[#10281d]' : 'text-[#d9ebc4] hover:bg-white/10 hover:text-white' }}">
    @if ($dashboardActive)
        <span class="sidebar-active-indicator absolute top-1/2 left-0 h-8 w-1 -translate-y-1/2 rounded-r-full bg-[#d7f0a4]"></span>
    @endif
    <span class="sidebar-icon-wrap grid h-8 w-8 shrink-0 place-items-center rounded-lg {{ $dashboardActive ? 'bg-[#10281d]/15' : 'bg-white/5' }}">
        {!! $renderIcon('dashboard') !!}
    </span>
    Tableau de Bord
</a>

<nav class="space-y-1">
    @foreach ($groups as $group)
        @php
            $childActive = collect($group['children'])->contains(function ($child) {
                return request()->routeIs(...(array) ($child['active'] ?? $child['route']));
            });
        @endphp
        <details class="group/nav mb-1" @if ($childActive) open @endif>
            <summary class="sidebar-nav-item flex cursor-pointer list-none items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold text-[#d9ebc4] transition hover:bg-white/10 hover:text-white {{ $childActive ? 'sidebar-section-open bg-gradient-to-r '.$group['accent'].' text-white' : '' }}">
                <span class="sidebar-icon-wrap grid h-8 w-8 shrink-0 place-items-center rounded-lg {{ $childActive ? 'bg-white/20' : 'bg-white/5' }}">
                    {!! $renderIcon($group['icon']) !!}
                </span>
                <span class="flex-1 truncate text-left">{{ $group['label'] }}</span>
                <span class="grid h-6 w-6 place-items-center rounded-md bg-white/5 transition group-open/nav:rotate-180">
                    <svg class="h-3.5 w-3.5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </span>
            </summary>
            <div class="sidebar-tree-line mt-1.5 ml-4 space-y-0.5 border-l-2 py-1 pl-3">
                @foreach ($group['children'] as $child)
                    @php $active = request()->routeIs(...(array) ($child['active'] ?? $child['route'])); @endphp
                    <a href="{{ route($child['route']) }}"
                        class="sidebar-child-item group/child relative flex items-center gap-2.5 rounded-lg px-2.5 py-2 text-[13px] font-medium transition {{ $active ? 'sidebar-child-active text-white' : 'text-[#c9dfb0]/85 hover:bg-white/5 hover:text-white' }}">
                        @if ($active)
                            <span class="absolute top-1/2 left-0 h-5 w-0.5 -translate-y-1/2 rounded-full bg-[#b8dc79]"></span>
                        @endif
                        <span class="sidebar-child-icon {{ $active ? 'text-[#d7f0a4]' : 'opacity-70' }}">{!! $renderIcon($child['icon'], 'h-4 w-4') !!}</span>
                        <span class="truncate">{{ $child['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </details>
    @endforeach
</nav>
